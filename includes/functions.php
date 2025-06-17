<?php
function getAllBugs($conn) {
    $sql = "SELECT b.*, 
                   u1.username as reported_by_name, 
                   u2.username as assigned_to_name 
            FROM bugs b
            LEFT JOIN users u1 ON b.reported_by = u1.id
            LEFT JOIN users u2 ON b.assigned_to = u2.id
            ORDER BY b.created_at DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function getAllUsers($conn) {
    $sql = "SELECT id, username, role FROM users ORDER BY username";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}






function getBugsAssignedToUser($conn, $userId) {
    $stmt = $conn->prepare("SELECT b.*, u.username as reported_by_name 
                           FROM bugs b
                           JOIN users u ON b.reported_by = u.id
                           WHERE b.assigned_to = ?
                           ORDER BY b.created_at DESC");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getBugsReportedByUser($conn, $userId) {
    $stmt = $conn->prepare("SELECT b.*, u.username as assigned_to_name 
                           FROM bugs b
                           LEFT JOIN users u ON b.assigned_to = u.id
                           WHERE b.reported_by = ?
                           ORDER BY b.created_at DESC");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


?>