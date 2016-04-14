




SELECT [Bookings].bbid, [Bookings].bookingstartdate, [Bookings].bookingenddate, [Bookings].numberofadults

FROM [Bookings]
WHERE [Bookings].bookingenddate NOT BETWEEN '2016/07/20' AND '2016/07/25'
AND [Bookings].bookingstartdate NOT BETWEEN '2016/07/20' AND '2016/07/25'
AND [Bookings].bbid NOT IN (

    SELECT [Bookings].bbid
FROM [Bookings]
WHERE ([Bookings].bookingstartdate < '2016/07/20' AND [Bookings].bookingenddate > '2016/07/25' )



)



