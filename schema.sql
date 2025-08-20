CREATE TABLE IF NOT EXISTS providers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  service ENUM('Plumber','Electrician','Carpenter','Salon','Cleaning','Tutor','Painter','AC Repair','Electronics') NOT NULL,
  price INT NOT NULL,
  rating DECIMAL(2,1) DEFAULT 4.5,
  verified TINYINT(1) DEFAULT 0,
  experience_years INT DEFAULT 0,
  tags VARCHAR(255) DEFAULT '',
  location VARCHAR(120) NOT NULL,
  availability ENUM('Today','Tomorrow','This Week','Weekends') DEFAULT 'This Week',
  contact_email VARCHAR(160) NOT NULL,
  contact_phone VARCHAR(40) NOT NULL,
  short_desc VARCHAR(280) DEFAULT '',
  long_desc TEXT,
  photo_path VARCHAR(255),
  id_doc_path VARCHAR(255),
  status ENUM('pending','approved','rejected') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provider_id INT NOT NULL,
  customer_name VARCHAR(120) NOT NULL,
  customer_email VARCHAR(160) NOT NULL,
  customer_phone VARCHAR(40) NOT NULL,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (provider_id) REFERENCES providers(id) ON DELETE CASCADE
);
