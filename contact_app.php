<?php

function addContact(array &$contacts, string $name, string $email, string $phone): void {
    $contacts[] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone
    ];
}

function displayContacts(array $contacts): void {
    if (empty($contacts)) {
        echo "No contacts available.\n";
    } 
    else {
        echo "\nContact List:\n";
        foreach ($contacts as $index => $contact) {
            echo ($index + 1) . ". Name: {$contact['name']}, Email: {$contact['email']}, Phone: {$contact['phone']}\n";
        }
    }
}

$contacts = [];

while (true) {
    echo "\nContact Management Menu\n";
    echo "1. Add Contact\n";
    echo "2. View Contacts\n";
    echo "3. Exit\n";
    echo "Choose an option: ";

    $choice = readline();

    switch ($choice) {
        case '1':
            echo "\nEnter Name: ";
            $name = readline();
            echo "Enter Email: ";
            $email = readline();
            echo "Enter Phone: ";
            $phone = readline();
            addContact($contacts, $name, $email, $phone);
            echo "$name added successfully!\n";
            break;

        case '2':
            displayContacts($contacts);
            break;

        case '3':
            echo "Exiting.....\n";
            exit(0);

        default:
            echo "Invalid choice. Please try again.\n";
            break;
    }
}

?>
