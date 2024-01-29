<body>
    <table border="1" style="text-align:center;">
        <thead>
            <tr>
                <th>Job Number</th>
                <th>Date</th>
                <th>Team Name</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;

            if (!empty($details)) {
                foreach ($details as $row) {
                    $date = date("d M Y", strtotime($row['date'])); // Corrected line
                    $statusText = ($row['status'] == 0) ? 'Pending' : 'Approved'; // New line

                    ?>
                    <tr>
                        <td><?php echo $row['job_number']; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $row['team_name']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        <td><?php echo $statusText; ?></td> <!-- Display Pending or Approved -->
                    </tr>
                <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>
