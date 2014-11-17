SELECT DISTINCT(TT1.day),S.Name,TT2.Start_Time,TT2.Duration,TT1.Start_Time,TT1.Title,TT2.Title
FROM Time_Table TT1, Time_Table TT2,Student S
WHERE
TT1.Start_Time<(TT2.Start_Time+TT2.Duration)
AND TT2.Start_Time<TT1.Start_Time
AND TT1.Title<TT2.Title;
