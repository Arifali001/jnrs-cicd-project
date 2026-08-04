<?php
if (isset($_POST['submit_booking'])) {
    // 1. Data collect karein
    $name = $_POST['guest_name'];
    $phone = $_POST['guest_phone'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $rooms = $_POST['rooms'];
    $date_submitted = date('Y-m-d H:i:s');

    // --- CSV MEIN SAVE KAREIN ---
    $file_name = 'bookings.csv';
    $file_exists = file_exists($file_name);
    
    $file_handle = fopen($file_name, 'a'); // 'a' matlab append (niche add karega)
    
    // Agar file nayi hai toh header add karein
    if (!$file_exists) {
        fputcsv($file_handle, ['Date', 'Name', 'Phone', 'Check-In', 'Check-Out', 'Adults', 'Children', 'Rooms']);
    }
    
    // Data row add karein
    fputcsv($file_handle, [$date_submitted, $name, $phone, $check_in, $check_out, $adults, $children, $rooms]);
    fclose($file_handle);

    // --- OWNER KO MAIL BHEJEIN ---
    $to = "aashishsaini7337@gmail.com"; // Owner ka email address
    $subject = "New Booking Inquiry from JNRS Website";
    
    $message = "You have received a new booking request:\n\n";
    $message .= "Guest Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Check-In: $check_in\n";
    $message .= "Check-Out: $check_out\n";
    $message .= "Adults: $adults\n";
    $message .= "Children: $children\n";
    $message .= "Rooms: $rooms\n";
    $message .= "Submitted on: $date_submitted\n";

    $headers = "From: noreply@jnrshotels.com" . "\r\n" .
               "Reply-To: $phone" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Booking request sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: Mail could not be sent.";
    }
}
?>