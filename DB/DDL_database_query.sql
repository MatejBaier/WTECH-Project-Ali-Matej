CREATE TABLE "Users" (
  "id" SERIAL PRIMARY KEY,
  "full_name" TEXT,
  "email" TEXT UNIQUE,
  "phone_number" TEXT,
  "password" TEXT,
  "state" TEXT,
  "city" TEXT,
  "address" TEXT,
  "postal_code" TEXT,
  "is_admin" BOOLEAN
);

CREATE TABLE "Brands" (
  "id" SERIAL PRIMARY KEY,
  "name" TEXT,
  "logo" BYTEA
);

CREATE TABLE "Transmission" (
  "id" SERIAL PRIMARY KEY,
  "type" TEXT
);

CREATE TABLE "Fuel" (
  "id" SERIAL PRIMARY KEY,
  "type" TEXT
);

CREATE TABLE "Product" (
  "id" SERIAL PRIMARY KEY,
  "title" TEXT,
  "brand_id" INTEGER REFERENCES "Brands" ("id"),
  "price" INTEGER,
  "engine_power" INTEGER,
  "description" TEXT,
  "transmission_id" INTEGER REFERENCES "Transmission" ("id"),
  "fuel_id" INTEGER REFERENCES "Fuel" ("id")
);

CREATE TABLE "Product_images" (
  "id" SERIAL PRIMARY KEY,
  "product_id" INTEGER REFERENCES "Product" ("id"),
  "image" BYTEA
);

CREATE TABLE "Shopping_cart_items" (
  "user_id" INTEGER REFERENCES "Users" ("id"),
  "product_id" INTEGER REFERENCES "Product" ("id"),
  "quantity" INTEGER,
  PRIMARY KEY ("user_id", "product_id")
);

