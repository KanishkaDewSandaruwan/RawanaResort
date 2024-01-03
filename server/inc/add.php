<?php

function addRoom($data, $img)
{
	include 'connection.php';

	$room_name = $data['room_name'];
	$cat_id = $data['cat_id'];
	$room_details = $data['room_details'];
	$room_price = $data['room_price'];
	$room_occupancy = $data['room_occupancy'];
	$is_active = $data['is_active'];

	$count = checkRoomByName($room_name);

	if ($count == 0) {

		$sql = "INSERT INTO room(room_name, cat_id, room_details, room_price, room_occupancy, room_image, is_deleted, date_updated ,is_active) 
		VALUES('$room_name', '$cat_id', '$room_details', '$room_price', '$room_occupancy', '$img' ,0 , now(), '$is_active')";
		return mysqli_query($con, $sql);

	} else {
		echo json_encode($count);
	}
}




function addBooking($data)
{
	include 'connection.php';

	$room_id = $data['room_id'];
	$departure_date = $data['departure_date'];
	$arrival_date = $data['arrival_date'];
	$total = $data['total'];
	$booking_occupancy = $data['booking_occupancy'];

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nic = $data['nic'];
	$address = $data['address'];

	// Check if the customer with the given email already exists
	$customer_id = checkCustomerByEmailAddresss($email);

	if ($customer_id) {
		// Existing customer, use the customer_id directly
		$sqlBooking = "INSERT INTO booking(customer_id, room_id, total, arrival_date, departure_date, booking_occupancy, is_deleted, date_updated) 
                       VALUES('$customer_id', '$room_id', '$total', '$arrival_date', '$departure_date', '$booking_occupancy', 0, NOW())";

		mysqli_query($con, $sqlBooking);

		// Return the booking ID
		echo json_encode(mysqli_insert_id($con));
	} else {
		// Customer does not exist, insert a new customer
		$sqlCustomer = "INSERT INTO customer(name, email, phone,password, nic, address, is_deleted) 
                        VALUES('$name', '$email', '$phone', '', '$nic', '$address', 0)";

		mysqli_query($con, $sqlCustomer);

		// Get the newly inserted customer's ID
		$customer_id = mysqli_insert_id($con);

		if ($customer_id) {
			// Insert booking information
			$sqlBooking = "INSERT INTO booking(customer_id, room_id, total, arrival_date, departure_date, booking_occupancy, is_deleted, date_updated) 
                           VALUES('$customer_id', '$room_id', '$total', '$arrival_date', '$departure_date', '$booking_occupancy', 0, NOW())";

			mysqli_query($con, $sqlBooking);

			// Return the booking ID
			echo json_encode(mysqli_insert_id($con));
		} else {
			// Failed to get customer ID
			echo json_encode(['error' => 'Failed to add booking.']);
		}
	}
}



function addFacility($data)
{
	include 'connection.php';

	$facility_name = $data['facility_name'];
	$facility_desc = $data['facility_desc'];

	$count = checkFacilityByName($facility_name);

	if ($count == 0) {

		$sql = "INSERT INTO facility(facility_name, facility_desc) VALUES('$facility_name', '$facility_desc')";
		return mysqli_query($con, $sql);
	} else {
		echo json_encode($count);
	}
}


function addLocation($data, $img)
{
	include 'connection.php';

	$location_name = $data['location_name'];

	$count = checkLocationByName($location_name);

	if ($count == 0) {

		$sql = "INSERT INTO location(location_name, location_image) VALUES('$location_name', '$img')";
		return mysqli_query($con, $sql);

	} else {
		echo json_encode($count);
	}
}

function addCategory($data, $img)
{
	include 'connection.php';

	$category_name = $data['category_name'];

	$count = getAllCategoryByName($category_name);

	if ($count == 0) {

		$sql = "INSERT INTO category(cat_name, cat_image, is_deleted, date_updated) VALUES('$category_name', '$img', 0 , now())";
		return mysqli_query($con, $sql);
	} else {
		echo json_encode($count);
	}




}


//cntact
function addMessage($data)
{
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$subject = $data['subject'];
	$message = $data['message'];


	$sql = "INSERT INTO contact(name, email, subject, message, date_updated) VALUES('$name', '$email', '$subject', '$message', now())";
	return mysqli_query($con, $sql);
}



function createCustomer($data)
{
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nic = $data['nic'];
	$address = $data['address'];
	$password = $data['password'];

	$count = checkCustomerByEmailAddress($email);

	if ($count == 0) {
		$sql = "INSERT INTO customer(name, email, phone, nic, address, password, is_deleted) VALUES('$name', '$email', '$phone', '$nic', '$address', '$password', 0 )";
		return mysqli_query($con, $sql);
	} else {
		echo json_encode($count);
	}


}

function addCustomerPassword($data)
{
	include 'connection.php';

	$email = $data['email'];
	$password = $data['password'];

	$count = checkCustomerByEmailAddress($email);

	if ($count == 0) {
		echo json_encode($count);
	} else {
		$sql = "UPDATE customer SET password = '$password' WHERE email = '$email'";
		return mysqli_query($con, $sql);
	}
}

function checkCustomerEmail($data)
{
	include 'connection.php';

	$email = $data['email'];
	$count = checkCustomerByEmailAddress($email);


	if ($count == 0 && !isset($result)) {
		echo json_encode('new');
	} else {
		$result = checkCustomerUsingEmailAddress($email);
		$row = mysqli_fetch_assoc($result);
		if (isset($row['password']) && $row['password'] != '') {
			echo json_encode('exist');
		} else {
			echo json_encode('password');
		}
	}
}

function insertImagetoGallery($img)
{
	include 'connection.php';

	$sql = "INSERT INTO gallery(gallery_image) VALUES('$img')";
	return mysqli_query($con, $sql);
}

function insertImagetoRoomGallery($img, $data)
{
	include 'connection.php';

	$room_id = $data['room_id'];

	$sql = "INSERT INTO room_gallery(room_image, room_id) VALUES('$img', '$room_id')";
	return mysqli_query($con, $sql);
}


?>