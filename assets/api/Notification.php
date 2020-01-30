<?php
if (empty($_POST['name'])) {
  echo json_encode(['response' => 'error', 'message' => 'Enter data in field (Name)']);
} else {
  $name = (addslashes(strip_tags($_POST['name']))) ? addslashes(strip_tags($_POST['name'])) : 'LuginBR';

  echo json_encode(['response' => 'ok', 'message' => 'Hello <strong style="color: #3498db;">' . $name . '</strong>! You request was completed successfully.']);
}