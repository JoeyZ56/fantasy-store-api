<?php
session_start();
if (isset($_SESSION['test'])) {
    echo "Test value found in session: " . $_SESSION['test'];
} else {
    echo "No test value found in session.";
}
