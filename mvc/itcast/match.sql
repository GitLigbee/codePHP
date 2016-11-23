--比赛
create table tch(
m_id int unsigned primary key auto_increment,
t1_id int unsigned comment '球队1——id',
t2_id int unsigned comment '球队2——id',
t1_score int comment '球队1-分数',
t2_score int comment '球队2-分数',
m_time int comment '比赛时间 时间戳'
)charset=utf8;


insert into tch values
(null,3,4,1,2,unix_timestamp('2015-01-01 12:00:00')),
(null,1,2,2,3,unix_timestamp('2015-02-01 13:00:00')),
(null,4,2,2,0,unix_timestamp('2015-03-01 14:00:00')),
(null,3,1,2,0,unix_timestamp('2015-04-01 15:00:00')),
(null,5,4,0,2,unix_timestamp('2015-05-01 16:00:00')),
(null,8,5,0,1,unix_timestamp('2015-06-01 17:00:00')),
(null,5,7,2,1,unix_timestamp('2015-07-01 19:00:00')),
(null,5,6,2,1,unix_timestamp('2015-07-01 19:20:00'));

--球队
create table team(
t_id int unsigned primary key auto_increment,
t_name varchar(20)
)charset=utf8;

insert into team values
(4,'h'),
(3,'c'),
(1,'a'),
(2,'b'),
(5,'d'),
(6,'e'),
(7,'f'),
(8,'g');

--运动员
create table player(
p_id int unsigned primary key auto_increment,
p_name varchar(20),
t_id int unsigned comment '球队id'
)charset=utf8;

insert into player values
(null,'aa',5),
(null,'bb',5),
(null,'cc',5),
(null,'dd',5),
(null,'ee',5),
(null,'ff',5);

select * from tch as m left join team as t on m.t1_id=t.t_id;

select m.m_id,t.t_name as t1,m.t1_score,a.t_name as t2,m.t2_score,m.m_time from  tch as m left join team as t on m.t1_id=t.t_id left join team as a on m.t2_id=a.t_id;