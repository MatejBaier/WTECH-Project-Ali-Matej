-- Brands
INSERT INTO "Brands" ("name") VALUES ('Audi'), ('Bentley'), ('BMW'), ('Ferrari'), ('Jaguar'), ('Lamborghini'), ('Maserati'), ('Tesla');

-- Fuel types
INSERT INTO "Fuel" ("type") VALUES ('Petrol'), ('Diesel'), ('Electric'), ('CNG'), ('LPG'), ('Hybrid'), ('Hydrogen');

-- Transmission
INSERT INTO "Transmission" ("type") VALUES ('Automatic'), ('Manual');

-- Users
INSERT INTO "Users" ("full_name", "email", "phone_number", "password", "state", "city", "address", "postal_code", "is_admin") VALUES
  ('Ali Alinovsky', 'ali@shop.com', '1234567890', 'AliAdmin', 'Slovakia', 'Bratislava', 'Ali Street 1', '81101', TRUE),

  ('Bajo Bajovsky', 'bajo@shop.com', '0987654321', 'BajoAdmin', 'Slovakia', 'Senec', 'Kebab Street 2', '90301', TRUE),

  ('Fero Sumacher', 'fero@sumacher.com', '099999999999', 'Feri', 'Slovakia', 'Žilina', 'Pretekarska 3', '01001', FALSE),

  ('Jozko Mrkvicka', 'jozko.mrkvicka@gmail.com', '01111111111', 'Jozi', 'Slovakia', 'Nitra', 'Zahradkarska 4', '94901', FALSE);


-- PRODUCTS ===============================================================

-- Ferrari
INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('Ferrari F8 Tributo V8 Supercar', 4, 246595, 806, 'The Ferrari F8 Tributo combines performance and elegance in a V8-powered mid-engine layout. This content was generated using AI.', 1, 1),

('Ferrari 812 Superfast Luxury Beast', 4, 421969, 818, 'Experience raw power with the Ferrari 812 Superfast, built for speed and dominance. This content was generated using AI.', 2, 6),

('Ferrari Roma Sleek Grand Tourer', 4, 301256, 874, 'The Ferrari Roma redefines daily luxury with classic style and modern muscle. This content was generated using AI.', 1, 6),

('Ferrari SF90 Stradale Hybrid Hypercar', 4, 249902, 707, 'Ferrari’s SF90 Stradale pushes boundaries with hybrid technology and mind-bending acceleration. This content was generated using AI.', 2, 1),

('Ferrari Portofino M Convertible Cruiser', 4, 221357, 613, 'Enjoy the wind and power with the open-top Ferrari Portofino M, designed for freedom. This content was generated using AI.', 2, 3),

('Ferrari LaFerrari Hybrid Icon', 4, 451773, 812, 'LaFerrari is an icon, merging hybrid efficiency with race-grade engineering. This content was generated using AI.', 1, 1),

('Ferrari 296 GTB Plug-In Hybrid Coupe', 4, 232002, 895, 'The 296 GTB introduces a new era of plug-in hybrid power in a compact, stylish form. This content was generated using AI.', 1, 6),

('Ferrari GTC4Lusso V12 Grand Tourer', 4, 263370, 924, 'GTC4Lusso pairs V12 performance with surprising versatility and all-wheel-drive control. This content was generated using AI.', 2, 1),

('Ferrari California T Hardtop Convertible', 4, 295764, 643, 'California T blends everyday comfort with Ferrari’s legendary performance. This content was generated using AI.', 2, 3),

('Ferrari Monza SP2 Limited Edition', 4, 487311, 999, 'The Monza SP2 is a rare barchetta for pure driving enthusiasts and collectors. This content was generated using AI.', 1, 1),

('Ferrari Daytona SP3 Retro-Inspired Supercar', 4, 364521, 965, 'Daytona SP3 is inspired by Ferrari’s racing past with futuristic performance and aesthetics. This content was generated using AI.', 1, 6);

-- Audi
INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('Audi RS7 Sportback Matte Black Edition', 1, 105395, 594, 'The RS7 Sportback in matte black finish blends aggression with elegance in a high-performance package. This content was generated using AI.', 1, 1),

('Audi Q8 e-tron Glacier White Electric SUV', 1, 99600, 595, 'Audi Q8 e-tron in glacier white delivers a luxurious and silent electric driving experience with quattro control. This content was generated using AI.', 2, 3),

('Audi R8 V10 Performance Spyder Red Carbon', 1, 113767, 545, 'The R8 Spyder combines a roaring V10 engine with striking red paint and carbon fiber detailing. This content was generated using AI.', 1, 1);

-- Bentley
INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('Bentley Continental GT Azure Blue Coupe', 2, 285539, 568, 'The Continental GT in Azure Blue is a luxurious grand tourer with a hand-crafted interior and refined power. This content was generated using AI.', 2, 2),

('Bentley Bentayga V8 Blackline Edition', 2, 294074, 627, 'Bentayga Blackline Edition blends sporty styling with SUV practicality and V8 performance. This content was generated using AI.', 1, 6),

('Bentley Flying Spur Mulliner Edition', 2, 323774, 536, 'Flying Spur Mulliner Edition offers bespoke luxury, comfort, and dynamic driving in a four-door saloon. This content was generated using AI.', 1, 1),

('Bentley Mulsanne Speed British Racing Green', 2, 222313, 621, 'The Mulsanne Speed in classic British Racing Green delivers elite luxury with a powerful twin-turbo V8. This content was generated using AI.', 1, 2);

-- BMW
INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('BMW M5 Competition Alpine White Performance Sedan', 3, 97778, 579, 'The M5 Competition in Alpine White delivers razor-sharp handling with luxury comfort and aggressive M styling. This content was generated using AI.', 2, 6),

('BMW X6 M Black Sapphire Luxury SUV', 3, 140211, 455, 'X6 M in Black Sapphire is a bold performance SUV that merges coupe design with V8 power and sport aesthetics. This content was generated using AI.', 1, 3),

('BMW i8 Roadster Futuristic Hybrid Convertible', 3, 124413, 384, 'The i8 Roadster is a plug-in hybrid that blends futuristic design with open-top driving and innovation. This content was generated using AI.', 1, 3),

('BMW 7 Series Individual Frozen Cashmere Silver', 3, 146224, 455, 'BMW 7 Series in Frozen Cashmere Silver represents the pinnacle of elegance, executive presence, and comfort. This content was generated using AI.', 1, 3);

-- Jaguar
INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('Jaguar F-Type P575 R AWD Coupe in Firenze Red', 5, 118988, 469, 'The F-Type R in Firenze Red is a powerful AWD coupe with a supercharged V8 and assertive styling. This content was generated using AI.', 1, 3),

('Jaguar I-PACE HSE EV400 Electric SUV in Eiger Grey', 5, 101565, 423, 'The I-PACE HSE in Eiger Grey is a fully electric SUV that balances luxury with futuristic performance. This content was generated using AI.', 1, 3);

-- Lamborghini
INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('Lamborghini Aventador SVJ Roadster in Arancio Atlas', 6, 276458, 814, 'The Aventador SVJ Roadster in Arancio Atlas combines extreme performance with open-air freedom and carbon fiber aggression. This content was generated using AI.', 1, 6),

('Lamborghini Urus Performante in Nero Noctis', 6, 449070, 844, 'The Urus Performante in Nero Noctis redefines the performance SUV segment with track-ready handling and brutal power. This content was generated using AI.', 2, 1),

('Lamborghini Huracán Tecnica in Verde Mantis', 6, 429295, 758, 'The Huracán Tecnica in Verde Mantis brings rear-wheel-drive thrills and track-oriented tech in a striking green finish. This content was generated using AI.', 1, 1),

('Lamborghini Revuelto Hybrid V12 in Bianco Monocerus', 6, 413776, 838, 'The Revuelto is Lamborghini’s hybrid V12 flagship, merging futuristic design with raw performance and innovation. This content was generated using AI.', 2, 1);

-- Maserati

INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('Maserati MC20 Coupe in Blu Infinito', 7, 169180, 603, 'The MC20 in Blu Infinito is a mid-engine supercar with lightweight carbon construction and a twin-turbo V6 engine. This content was generated using AI.', 2, 1),

('Maserati Levante Trofeo SUV in Grigio Maratea', 7, 162858, 566, 'Levante Trofeo in Grigio Maratea delivers SUV practicality with track-ready performance and Italian luxury. This content was generated using AI.', 2, 1);

-- Tesla
INSERT INTO "Product" ("title", "brand_id", "price", "engine_power", "description", "transmission_id", "fuel_id") VALUES
('Tesla Model S Plaid in Pearl White Multi-Coat', 8, 98613, 692, 'Model S Plaid in Pearl White offers blistering acceleration, all-electric luxury, and industry-leading tech. This content was generated using AI.', 1, 3),

('Tesla Model X Long Range in Deep Blue Metallic', 8, 91843, 683, 'Model X Long Range in Deep Blue delivers unmatched space, falcon-wing doors, and dual-motor efficiency. This content was generated using AI.', 1, 3),

('Tesla Cybertruck Tri-Motor AWD in Stainless Steel', 8, 131744, 916, 'Cybertruck Tri-Motor in raw stainless steel redefines futuristic utility with power, range, and angular design. This content was generated using AI.', 1, 3);

-- Cart
INSERT INTO "Shopping_cart_items" ("user_id", "product_id", "quantity") VALUES
-- Ali Alinovsky
(1, 1, 1),   -- Ferrari F8 Tributo
(1, 15, 1),  -- Bentley Continental GT

-- Bajo Bajovsky
(2, 31, 2),  -- Tesla Model S Plaid
(2, 19, 1),  -- BMW M5 Competition

-- Fero Sumacher
(3, 14, 1),  -- Audi R8 Spyder
(3, 23, 1),  -- Jaguar F-Type
(3, 25, 1),  -- Lamborghini Aventador

-- Jozko Mrkvicka
(4, 13, 1),  -- Audi Q8 e-tron
(4, 32, 2),  -- Tesla Model X
(4, 30, 1);  -- Maserati Levante


