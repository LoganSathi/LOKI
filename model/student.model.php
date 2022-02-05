<?php
include_once '../config/dbh.config.php';

class StudentModel extends Dbh
{
    protected function getClassName($id)
    {
        $sql = "SELECT `name` FROM class WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getClassId($name)
    {
        $sql = "SELECT `id` FROM class WHERE name=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getClass($form)
    {
        $sql = "SELECT `name`, `id` FROM class WHERE form=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$form]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function insertStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class)
    {
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $dbname = "qr-sas";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try {
            $sql = "INSERT INTO `parent` (`name`, `relationship`, `email`, `contact`) VALUES (?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$pname, $relationship, $email, $pcontact]);
            $lastId = $conn->lastInsertId();
            $sql = "INSERT INTO `student` (`name`, `dob`, `gender`,`class_id`, `parent_id`, `total_absent_days`, `cons_absent_days`) VALUES (?,?,?,?,?,?,?);";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $dob, $gender, $class, $lastId, '0', '0']);
            return $lastId;
        } catch (PDOException $e) {
        }
    }

    protected function getId($parentId)
    {
        $sql = "SELECT `id` FROM student WHERE parent_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$parentId]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getClassStudents($class)
    {
        $sql = "SELECT student.id, student.name, parent.name AS parent, student.parent_id, parent.contact, parent.email, class.name AS class FROM student INNER JOIN parent ON parent.id = student.parent_id INNER JOIN class ON class.id = student.class_id WHERE class_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$class]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getAllStudents()
    {
        $sql = "SELECT student.id, student.name, parent.name AS parent, student.parent_id, parent.contact, parent.email, class.name AS class FROM student INNER JOIN parent ON parent.id = student.parent_id INNER JOIN class ON class.id = student.class_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getDetails($id)
    {
        $sql = "SELECT student.name, DATE_FORMAT(dob,'%d %b %Y') AS 'dob_format', student.dob, student.gender, parent.id AS parentId, parent.email, parent.name AS parent, parent.relationship, parent.contact, class.name AS class, class.id AS classId, class.form FROM student INNER JOIN parent ON parent.id = student.parent_id INNER JOIN class ON class.id = student.class_id WHERE student.id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function incrementAmount($class)
    {
        $sql = "UPDATE class SET `student_amount` = (`student_amount` + 1) WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$class]);
    }

    protected function decrementAmount($student)
    {
        $sql = "UPDATE class INNER JOIN student ON student.class_id = class.id SET `student_amount` = (`student_amount` - 1) WHERE student.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student]);
    }

    protected function updateStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class, $id)
    {
        $sql = "UPDATE student INNER JOIN parent ON parent.id = student.parent_id SET student.name=?, student.gender= ?, student.dob=?, parent.relationship=?, parent.name=?, parent.contact=?, parent.email=?, student.class_id=? WHERE student.id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class, $id]);
    }

    protected function deleteStudent($id)
    {
        $sql = "DELETE student, parent FROM student INNER JOIN parent ON student.parent_id = parent.id WHERE student.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function getName($id)
    {
        $sql = "SELECT student.name, class.name AS class FROM student INNER JOIN class ON student.class_id = class.id WHERE student.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
