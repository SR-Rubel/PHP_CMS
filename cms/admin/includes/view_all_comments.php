<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Comment_id</th>
            <th>Comment_post_id</th>
            <th>Comment_author</th>
            <th>Comment_email</th>
            <th>Comment_content</th>
            <th>Comment_status</th>
            <th>Comment_date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query="SELECT * FROM comments";
        $all_post_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($all_post_query)){
        $comment_id=$row['comment_id'];
        $comment_post_id=$row['comment_post_id'];
        $comment_author=$row['comment_author'];
        $comment_email=$row['comment_email'];
        $comment_content=$row['comment_content'];
        $comment_status=$row['comment_status'];
        $comment_date=$row['comment_date'];
        

        // $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
        // $select_all_cat_query=mysqli_query($connection,$query);
        // while($row=mysqli_fetch_assoc($select_all_cat_query)){
        // $cat_title=$row['cat_title'];
        // }

        echo "<tr>
        <td>$comment_id</td>
        <td>$comment_post_id</td>
        <td>$comment_author</td>
        <td>$comment_email</td>
        <td>$comment_content</td>
        <td>$comment_status</td>
        <td>$comment_date</td>
        <td><a href='posts.php?delete={$comment_id}'>Approve<a/></td>
        <td><a href='posts.php?delete={$comment_id}'>Unapprove<a/></td>
        <td><a href='posts.php?delete={$comment_id}'>DELETE<a/></td>
        </tr>";
        }
        ?>
        <?php ?>
    </tbody>
</table>

<?php 
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query="DELETE FROM post WHERE post_id=$delete_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("location: ./posts.php");
    }
?>