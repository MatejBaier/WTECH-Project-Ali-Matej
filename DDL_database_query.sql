CREATE TABLE "Users" (
  "id" integer PRIMARY KEY,
  "full_name" string,
  "email" string,
  "phone_number" string,
  "password" string,
  "state" string,
  "city" string,
  "address" string,
  "postal_code" string,
  "is_admin" bool
);

CREATE TABLE "Shopping_cart_items" (
  "user_id" integer,
  "product_id" integer,
  "quantity" ineger,
  PRIMARY KEY ("user_id", "product_id")
);

CREATE TABLE "Brands" (
  "id" integer PRIMARY KEY,
  "name" string,
  "logo" bytea
);

CREATE TABLE "Transmission" (
  "id" integer PRIMARY KEY,
  "type" string
);

CREATE TABLE "Fuel" (
  "id" integer PRIMARY KEY,
  "type" string
);

CREATE TABLE "Product" (
  "id" integer PRIMARY KEY,
  "title" string,
  "brand_id" integer,
  "price" integer,
  "engine_power" integer,
  "description" string,
  "transmission_id" integer,
  "fuel_id" integer
);

CREATE TABLE "Product_images" (
  "product_id" integer PRIMARY KEY,
  "image" bytea
);

ALTER TABLE "Users" ADD FOREIGN KEY ("id") REFERENCES "Shopping_cart_items" ("user_id");

ALTER TABLE "Product" ADD FOREIGN KEY ("id") REFERENCES "Shopping_cart_items" ("product_id");

ALTER TABLE "Transmission" ADD FOREIGN KEY ("id") REFERENCES "Product" ("transmission_id");

ALTER TABLE "Fuel" ADD FOREIGN KEY ("id") REFERENCES "Product" ("fuel_id");

ALTER TABLE "Brands" ADD FOREIGN KEY ("id") REFERENCES "Product" ("brand_id");

ALTER TABLE "Product" ADD FOREIGN KEY ("id") REFERENCES "Product_images" ("product_id");
