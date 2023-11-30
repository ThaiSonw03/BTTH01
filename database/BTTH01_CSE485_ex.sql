-- a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình
SELECT ma_bviet, tieude, ten_bhat, noidung
FROM baiviet
WHERE ma_tloai = 2;

--	b. Liệt kê các bài viết của tác giả “Nhacvietplus”
SELECT ma_bviet, tieude, ten_bhat, noidung
FROM baiviet
WHERE ma_tgia = 1;

-- c. Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
SELECT t.ma_tloai, t.ten_tloai
FROM theloai t
LEFT JOIN baiviet b ON t.ma_tloai = b.ma_tloai
WHERE b.ma_bviet IS NULL;

-- d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết.
SELECT
  b.ma_bviet,
  b.tieude AS ten_baiviet,
  b.ten_bhat,
  tg.ten_tgia AS ten_tacgia,
  tl.ten_tloai AS ten_theloai,
  b.ngayviet
FROM
  baiviet b
  JOIN tacgia tg ON b.ma_tgia = tg.ma_tgia
  JOIN theloai tl ON b.ma_tloai = tl.ma_tloai;
  
-- e. Tìm thể loại có số bài viết nhiều nhất
SELECT
  tl.ten_tloai AS ten_theloai,
  COUNT(b.ma_bviet) AS so_baiviet
FROM
  theloai tl
  JOIN baiviet b ON tl.ma_tloai = b.ma_tloai
GROUP BY
  tl.ma_tloai
ORDER BY
  so_baiviet DESC
LIMIT 1;

-- f. Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT
  tg.ten_tgia AS ten_tacgia,
  COUNT(b.ma_bviet) AS so_baiviet
FROM
  tacgia tg
  JOIN baiviet b ON tg.ma_tgia = b.ma_tgia
GROUP BY
  tg.ma_tgia
ORDER BY
  so_baiviet DESC
LIMIT 2;