select username, f_name, l_name, designation, created, in_time, out_time
from in_out_records
where (date(created) between '2017-12-01' AND '2019-12-31')
  and username = '227104';

select username, f_name, l_name, designation, created, in_time, out_time
from in_out_records
where username = '6969';
select *
from in_out_records
where username = '6969';

truncate in_out_records;
alter table in_out_records
    modify in_date DATETIME null;
alter table in_out_records
    modify out_date DATETIME null;


# ------------------------------------------------------------------
select *
from users
where username = '12345';
select *
from users
where username = '9001764';
select *
from in_out_records
where username = '6969';
select *
from in_out_records
where username = '9001764'
  and modified is not null
limit 5;
select str_to_date('10:21:04 PM', '%h:%i:%s %p');
select STR_TO_DATE('8:25 PM', '%l:%i %p');
# Imp
update in_out_records
set out_time=(STR_TO_DATE('%h:%i:%s %p'))
where username = '9001764'
  and modified is not null
limit 1;
UPDATE in_out_records
SET out_time = out_time + INTERVAL 12 HOUR
WHERE out_time < '18:00:00';

# ----------------------------------------------------------------
select *
from in_out_records
where username = '9001764'
  and modified is not null
limit 5;
select *
from users;
