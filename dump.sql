create table "user"
(
    id           bigserial
        constraint user_pk primary key,
    name         varchar     not null,
    access_token varchar(32) not null
);
create unique index user_access_token_uindex on "user" (access_token);

create table category
(
    id    serial
        constraint category_pk primary key,
    title varchar not null
);

create table product
(
    id          bigserial
        constraint product_pk primary key,
    title       varchar not null,
    user_id     int8    not null
        constraint product_user_id_fk references "user" on update restrict on delete restrict,
    category_id int     not null
        constraint product_category_id_fk references category on update restrict on delete restrict
);
create index product_user_id_index on product (user_id);
create index product_category_id_index on product (category_id);


create table tag
(
    id    serial
        constraint tag_pk primary key,
    title int not null
);

create table tag_product
(
    tag_id     int  not null
        constraint tag_product_tag_id_fk references tag on update cascade on delete cascade,
    product_id int8 not null
        constraint tag_product_product_id_fk references product on update cascade,
    constraint tag_product_pk primary key (tag_id, product_id)
);

INSERT INTO category (id, title) VALUES (1, 'Горные лыжи');
INSERT INTO category (id, title) VALUES (2, 'Куртка');
INSERT INTO category (id, title) VALUES (3, 'Брюки');
INSERT INTO category (id, title) VALUES (4, 'Шлем');
INSERT INTO category (id, title) VALUES (5, 'Комбинезон');
INSERT INTO category (id, title) VALUES (6, 'Перчатки');

INSERT INTO "user" (id, name, access_token) VALUES (2, 'Екатерина', 'qI98vsedIwH7nMNAcpzQ0dPUXhRYDSga');
INSERT INTO "user" (id, name, access_token) VALUES (4, 'Вероника', 'tTB-TnAzJMgKYTdTim0nq4ToCv9xmAkY');
INSERT INTO "user" (id, name, access_token) VALUES (1, 'Эдуард', 'LMzTZ9qAs4MpRxX_-GEfrmFQpSFGSZJD');
INSERT INTO "user" (id, name, access_token) VALUES (3, 'Эвелина', 'Q81S6qJnUrrha8CGemm8bpYlNnLbbYVk');

INSERT INTO product (id, title, user_id, category_id) VALUES (1, 'Куртка горнолыжная для фрирайда', 1, 2);
INSERT INTO product (id, title, user_id, category_id) VALUES (2, 'Брюки лыжные', 3, 3);
INSERT INTO product (id, title, user_id, category_id) VALUES (3, 'Лыжи для трассового катания', 1, 1);
INSERT INTO product (id, title, user_id, category_id) VALUES (4, 'Куртка для катания на сноуборде и лыжах', 2, 2);
INSERT INTO product (id, title, user_id, category_id) VALUES (5, 'Шлем лыжный с защитным козырьком', 4, 4);