# README #
Project manage schedule of works

## Run project
```sh
git clone https://github.com/ntnam1993/MVC.git
```
```sh
composer install
```
### Create Table
```sh
create database todo;
create table `todo`.`work` (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    start datetime NOT NULL,
    end datetime NOT NULL
);
```
Create work table
| Column      | Type                 | Comment |
|-------------|----------------------|---------|
| id          | int(11)Auto Increment|         |
| name        | varchar(191)         |         |
| start       | datetime             |         |
| end         | datetime             |         |
