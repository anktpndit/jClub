-- 1. Who is the moderator of a club? (join); given Rowing Club is the club
SELECT 	S.student_name,S.student_DOB, S.student_gender, S.student_major, S.student_contact,C.moderator_position FROM STUDENT S
INNER JOIN (SELECT student_id,moderator_position FROM MODERATOR A 
	INNER JOIN (SELECT moderator_id FROM SUPERVISES 
                WHERE club_id= (
                    SELECT club_id
                    FROM CLUB
                    WHERE club_name='Rowing Club')) AS B ON A.moderator_id=B.moderator_id) AS C ON S.student_id=C.student_id;

-- 2. Who are the members of a particular Club
SELECT S.student_name, S.student_DOB, S.student_gender, S.student_major, S.student_contact FROM STUDENT S
INNER JOIN(
    SELECT H.student_id FROM HAS H
	INNER JOIN(
    	SELECT C.club_id FROM CLUB C
			WHERE C.club_name='Indoor Soccer Club') AS I ON I.club_id=H.club_id) AS J ON J.student_id=S.student_id;

-- 3. What activities is the specified club/my club doing? (join) suppose i am registered in Rowing Club
SELECT A.activity_name, A.activity_location, A.activity_desc, A.activity_type, A.activity_day, A.activity_time FROM ACTIVITY A
INNER JOIN( 
	SELECT O.activity_id FROM ORGANIZES O
	INNER JOIN(
 		SELECT C.club_id FROM CLUB C 
			WHERE C.club_name='Rowing Club') AS I ON I.club_id=O.club_id) AS Q ON Q.activity_id=A.activity_id;

-- 4. What activities are happening today?
SELECT A.activity_name, A.activity_location, A.activity_desc, A.activity_type, A.activity_time FROM ACTIVITY A 
    WHERE A.activity_day='Monday';

-- 5. How many members are in the club? (aggregate)
SELECT COUNT(E.club_id) AS 'Count' FROM HAS E 
    INNER JOIN(
	    SELECT club_id FROM CLUB
    	WHERE club_name='Indoor Soccer Club') AS F ON E.club_id=F.club_id;

-- 6. What clubs am I registered in ?
SELECT C.club_name AS Name,C.club_description AS Description,C.club_contact AS Contact,C.club_rating AS Ratings FROM CLUB C 
INNER JOIN	(
	SELECT club_id FROM REGISTER R
		INNER JOIN 	(SELECT student_id FROM STUDENT S
			WHERE S.student_name='Ankit Pandit') AS G ON R.student_id=G.student_id) AS F ON F.club_id=C.club_id;


-- 7. How do I contact the club?
SELECT B.club_name AS Name, B.club_contact AS Contact FROM CLUB B
INNER JOIN	(SELECT C.club_id FROM CLUB C 
		WHERE C.club_name='Indoor Soccer Club') AS D ON B.club_id=D.club_id;

-- 8. Group clubs having rating >3 in ascending order
SELECT C.club_name AS Club_Name, C.club_rating AS Club_Rating FROM CLUB C
    WHERE C.club_rating>3
ORDER BY C.club_rating;

-- 9 Query using group by for finding the average rating of a 'arts' club
SELECT AVG(C.club_rating) FROM CLUB C
GROUP BY arts
HAVING arts=1;
