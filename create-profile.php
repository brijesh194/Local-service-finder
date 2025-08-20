<?php require_once __DIR__ . '/helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Profile — <?= SITE_NAME ?></title>
<style>
body{margin:0;font-family:Inter,system-ui,Arial;background:#0f1115;color:#e6f1ff}
.wrap{max-width:900px;margin:0 auto;padding:24px}
.card{background:#121722;border:1px solid #1e2633;border-radius:16px;padding:20px;box-shadow:0 8px 40px rgba(0,0,0,.35); padding-right: 55px;}
h1{margin:10px 0}
label{display:block;margin:10px 0 6px;color:#c7d2fe}
input, select, textarea{width:100%;padding:12px;border-radius:12px;border:1px solid #243043;background:#0f131b;color:#dbeafe;margin: 10px 0px;}
.row{display:grid;grid-template-columns:1fr 1fr;gap:50px}
.btn{background:#22ccff;border:none;padding:12px 16px;border-radius:12px;font-weight:700;cursor:pointer;margin-top:12px}
.btn:hover{background:#1aa3cc}
.note{color:#94a3b8}
</style>
</head>
<body>
  <div class="wrap">
    <h1>Create Your Provider Profile</h1>
    <p class="note">Submit details with ID proof. Admin will verify and then your profile will show on homepage with a blue tick.</p>
    <form class="card" action="submit_profile.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div>
          <label>Name</label>
          <input name="name" required>
        </div>
        <div>
          <label>Service</label>
          <select name="service" required>
            <option>Plumber</option><option>Electrician</option><option>Carpenter</option>
            <option>Salon</option><option>Cleaning</option><option>Tutor</option>
            <option>Painter</option><option>AC Repair</option><option>Electronics</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div>
          <label>Starting Price (₹)</label>
          <input type="number" name="price" min="50" step="10" required>
        </div>
        <div>
          <label>Experience (years)</label>
          <input type="number" name="experience_years" min="0" max="60" value="0">
        </div>
      </div>

      <div class="row">
        <div>
          <label>Location (City/Area)</label>
          <input name="location" required>
        </div>
        <div>
          <label>Availability</label>
          <select name="availability">
            <option>Today</option><option>Tomorrow</option><option>This Week</option><option>Weekends</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div>
          <label>Contact Email</label>
          <input type="email" name="contact_email" required>
        </div>
        <div>
          <label>Contact Phone</label>
          <input name="contact_phone" required>
        </div>
      </div>

      <label>Tags (comma separated)</label>
      <input name="tags" placeholder="kitchen, wiring, haircut">

      <label>Short Description</label>
      <input name="short_desc" maxlength="280" placeholder="One line about your service">

      <label>Detailed Description</label>
      <textarea name="long_desc" rows="5" placeholder="Describe your skills, tools, specialization, coverage, terms..."></textarea>

      <div class="row">
        <div>
          <label>Profile Photo (JPG/PNG)</label>
          <input type="file" name="photo" accept="image/*" required>
        </div>
        <div>
          <label>ID Proof (JPG/PNG/PDF)</label>
          <input type="file" name="id_doc" accept="image/*,.pdf" required>
        </div>
      </div>

      <button class="btn" type="submit">Submit for Verification</button>
    </form>
  </div>
</body>
</html>
