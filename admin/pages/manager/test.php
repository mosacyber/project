            <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">الاقسام</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department_Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql_departments = "SELECT * FROM departments"; // تغيير اسم المتغير هنا
                            $result_departments = $conn->query($sql_departments); // تغيير اسم المتغير هنا
                            while($row = $result_departments->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>". $row["Department_ID"] ."</td>";
                                echo "<td>". $row["Department_Name"] ."</td>";
                                echo "<td>";
                                echo "<a href='#' class='edit-button' data-toggle='modal' data-target='#exampleModal' data-department-id='". $row["Department_ID"] ."' data-department-name='". $row["Department_Name"] ."' style='text-decoration: none !important;'><i class='material-icons'>edit</i></a> ";
                                echo "<a href='#' style='text-decoration: none !important;'><i class='material-icons'>visibility</i></a> ";
                                echo "<a href='#' onclick='openDeleteModal(\"".$row["Department_Name"]."\")' style='text-decoration: none !important;'><i class='material-icons'>delete</i></a> ";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>