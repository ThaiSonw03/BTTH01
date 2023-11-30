--g.	Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” 
SELECT *
FROM baiviet
WHERE ten_bhat LIKE '%yêu%'
   OR ten_bhat LIKE '%thương%'
   OR ten_bhat LIKE '%anh%'
   OR ten_bhat LIKE '%em%';

--h 	Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” 
SELECT *
FROM baiviet
WHERE tieude LIKE '%yêu%'
   OR ten_bhat LIKE '%yêu%'
   OR tieude LIKE '%thương%'
   OR ten_bhat LIKE '%thương%'
   OR tieude LIKE '%anh%'
   OR ten_bhat LIKE '%anh%'
   OR tieude LIKE '%em%'
   OR ten_bhat LIKE '%em%';
   --i.	Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả 
   CREATE VIEW vw_Music AS
SELECT
    baiviet.ma_bviet,
    baiviet.tieude,
    baiviet.ten_bhat,
    theloai.ten_tloai AS ten_theloai,
    tacgia.ten_tgia AS ten_tacgia,
    baiviet.tomtat,
    baiviet.noidung,
    baiviet.ngayviet,
    baiviet.hinhanh
	FROM baiviet
	JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
	JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;
select*from vw_Music;

--i.	Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả 
CREATE VIEW vw_Music AS
SELECT
    baiviet.ma_bviet,
    baiviet.tieude,
    baiviet.ten_bhat,
    theloai.ten_tloai AS ten_theloai,
    tacgia.ten_tgia AS ten_tacgia,
    baiviet.tomtat,
    baiviet.noidung,
    baiviet.ngayviet,
    baiviet.hinhanh
	FROM baiviet
	JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
	JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;
select*from vw_Music;

--j.	Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi
DELIMITER //

CREATE PROCEDURE sp_DSBaiViet(IN pTenTheLoai VARCHAR(255))
BEGIN
    DECLARE ma_tloai INT;

    -- Lấy mã thể loại từ tên thể loại
    SELECT ma_tloai INTO ma_tloai
    FROM theloai
    WHERE ten_tloai = pTenTheLoai;

    -- Kiểm tra xem thể loại có tồn tại không
    IF ma_tloai IS NOT NULL THEN
        -- Trả về danh sách bài viết của thể loại đó
        SELECT *
        FROM baiviet
        WHERE ma_tloai = ma_tloai;
    ELSE
        -- Hiển thị thông báo lỗi nếu thể loại không tồn tại
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Thể loại không tồn tại';
    END IF;
END //

DELIMITER ;

--l.	Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web. 

CREATE TABLE Users (
    user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);

