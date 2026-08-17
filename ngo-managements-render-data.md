# NGO Management Dashboard — Data & Render Conditions

Reference doc for the five NGO-management pages under the admin dashboard.
All pages query the `ngo_applications` table (model `App\Models\NgoApplication`) and
eager-load the related `ngo_profiles` row via the `profile` relationship.

Filters shared by Registered / Expired / Suspended pages (see `app/Support/NgoFilters.php`
for the district / thematic-area option lists):

- `district` — exact match on `profile.district`
- `thematic_area` — `LIKE %value%` on `profile.thematic_areas`
- `date_from` / `date_to` — range on each page's "date column" (see below)

---

## 1. Applications (Registration Applications)

- **Route:** `admin.registration-applications.index`
- **Controller:** `RegistrationApplicationsController@index`
- **View:** `resources/views/pages/dashboard/registration-applications/index.blade.php`

### Base condition

```
status IN ('submitted', 'under_review', 'rejected')
```

Only applications still in the review pipeline: **submitted**, **under review**, and
**rejected**. Excluded: `draft` (hidden from admin), `approved` (shown on the Registered /
Expired pages), and `suspended` (shown on the Suspended page). Ordered by `latest()`
(created_at desc).

### Filters

- `search` — matches `application_no` OR `registration_no` OR `profile.organization_name`
  via `LIKE %search%`
- `district` — `profile.district` exact match
- `thematic_area` — `profile.thematic_areas LIKE %value%`
- `date_from` / `date_to` — range on **`submitted_at`**

### Table columns

Application No · NGO Name · District · Thematic Areas · Status · Submitted At · Actions

---

## 2. Registered NGOs

- **Route:** `admin.ngos.registered.index`
- **Controller:** `RegisteredNgosController@index`
- **View:** `resources/views/pages/dashboard/ngos/registered.blade.php` (extends `_partial.blade.php`)

### Base condition

```
status IN ('approved')
```

Every approved NGO **and** every suspended NGO — regardless of expiry (expiry is NOT part
of the query here). This page is the master list of registered records.

### Date filter column

`date_from` / `date_to` → range on **`certificate_issue_date`**

### Table columns

S.No · NGO Name · District · Registration No · Registration Date (`certificate_issue_date`) ·
Renewal Date (`last_renewal_date`) · Expiry Date (`expiry_date`) · Thematic Areas · Actions (View / Review)

---

## 3. Expired NGOs

- **Route:** `admin.ngos.expired.index`
- **Controller:** `ExpiredNgosController@index`
- **View:** `resources/views/pages/dashboard/ngos/expired.blade.php` (extends `_partial.blade.php`)

### Base condition

```
status = 'approved'
AND expiry_date IS NOT NULL
AND expiry_date < today
```

Approved NGOs whose certificate has **already passed** its `expiry_date`
(date is strictly before today's date — expiry today is NOT counted as expired).

### Date filter column

`date_from` / `date_to` → range on **`expiry_date`**

### Table columns

S.No · NGO Name · District · Registration No · Registration Date · Renewal Date ·
Expired On (`expiry_date`) · Thematic Areas · Actions (Review only)

---

## 4. Suspended NGOs

- **Route:** `admin.ngos.suspended.index`
- **Controller:** `SuspendedNgosController@index`
- **View:** `resources/views/pages/dashboard/ngos/suspended.blade.php` (extends `_partial.blade.php`)

### Base condition

```
status = 'suspended'
```

Suspension is stored as an explicit status on `ngo_applications.status`
(set alongside `suspended_at` and `suspension_reason` from the edit page).

### Date filter column

`date_from` / `date_to` → range on **`suspended_at`**

### Table columns

S.No · NGO Name · District · Registration No · Registration Date (`certificate_issue_date`) ·
Suspension Date (`suspended_at`) · Thematic Areas · Reason of Suspension (`suspension_reason`)

---

## 5. Renewals

- **Route:** `admin.ngos.renewals.index`
- **Controller:** `NgoRenewalsController@index`
- **View:** `resources/views/pages/dashboard/ngos/renewals.blade.php`

### Base condition

```
status = 'approved'
```

Then an optional `scope` filter (GET param, default `due`):

- `scope=due` (default):
  ```
  expiry_date IS NULL
  OR expiry_date <= today + 90 days
  ```
  Shows approved NGOs with **no expiry set** or **expiring within the next 90 days**
  (including already-expired ones).
- `scope=all`: shows **all** approved NGOs (same condition as the Registered page).

### Ordering

```
ORDER BY COALESCE(expiry_date, '9999-12-31') ASC
```

NGOs without an expiry date sort last; soonest-expiring first.

### Filters

- `scope` — due / all
- `district` — `profile.district` exact match
- `thematic_area` — `profile.thematic_areas LIKE %value%`

### Table columns

NGO Name · District · Registration No · Registration Date · Expiry Date ·
Days Left · Renewals · Actions

Row-level computed values:

- `daysLeft` = `expiry_date - today` in days (`null` if no expiry date)
- `isExpired` = daysLeft is not null AND daysLeft < 0 → expiry shown red, "N days overdue"
- `urgent` = daysLeft between 0 and 90 → expiry shown amber
- `Renewals` column shows `Renewed YYYY-MM-DD` from `last_renewal_date`, else `Never`
- Actions = "Renew" button → Alpine modal → POST to `admin.ngos.renewals.renew`

### Renewal action (`NgoRenewalsController@renew`)

- Validates `renew_years` (1–10, default **3**)
- New expiry base:
  - if `expiry_date` set → `expiry_date + 1 day`
  - else → `now()`
- `new_expiry = base + renew_years years`
- Updates `expiry_date` = new date, `last_renewal_date` = today
- Redirects back to renewals index preserving `scope`, `district`, `thematic_area`

---

## Pagination & Export

All five index pages paginate **15 rows per page** (`paginate(15)->withQueryString()`),
and each shows a `Total:` count from the paginator.

Registered / Expired / Suspended pages also expose **Export PDF** and **Export Excel**
buttons (`admin.ngos.registered.export`, `admin.ngos.expired.export`,
`admin.ngos.suspended.export`), exporting the *same filtered* query:

- **Excel:** `App\Exports\NgosExport` — columns match the page type
  (suspended adds `suspended_at` + `suspension_reason`; expired/registered share
  name/district/reg no/registration date/renewal date/expiry date/thematic areas)
- **PDF:** `resources/views/pdf/ngos_report.blade.php`

The Applications page exports via `admin.registration-applications.export`
(`pdf.registration_applications_report` + `RegistrationApplicationsExport`).

---

## Summary matrix

| Page | status condition | additional condition | date filter column |
|---|---|---|---|
| Applications | `IN (submitted, under_review, rejected)` | — | `submitted_at` |
| Registered | `IN (approved, suspended)` | — | `certificate_issue_date` |
| Expired | `= approved` | `expiry_date NOT NULL AND expiry_date < today` | `expiry_date` |
| Suspended | `= suspended` | — | `suspended_at` |
| Renewals (due) | `= approved` | `expiry_date IS NULL OR expiry_date <= today+90d` | — (uses scope) |
| Renewals (all) | `= approved` | — | — |
