<?php include('config.php');

if(isset($_POST['delete_btn']))
{
    $exp_id = $_POST['delete_id'];

    $query = "DELETE FROM expired WHERE id='$exp_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Deleted Successfully";
        header('Location: ../expired.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong!";
        header('Location: ../expired.php');
        exit(0);
    }
}
?>