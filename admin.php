<?php
// JSON data
$json_data = '{
    "education": [
        {
            "id": 1,
            "degree": "BTech in Information Technology",
            "university": "XYZ University",
            "year": "2024"
        },
        {
            "id": 2,
            "degree": "High School",
            "university": "ABC School",
            "year": "2020"
        }
    ],
    "certificates": [
        {
            "id": 1,
            "name": "TEDx Marwadi University",
            "date": "August 9, 2024"
        },
        {
            "id": 2,
            "name": "Game Development Event",
            "date": "September 28, 2024"
        }
    ],
    "projects": [
        {
            "id": 1,
            "title": "Smart Classroom Management Software",
            "description": "A system for automating attendance using facial recognition."
        },
        {
            "id": 2,
            "title": "Portfolio Website",
            "description": "A personal portfolio showcasing skills, projects, and achievements."
        }
    ]
}';

// Decode JSON into an associative array
$data = json_decode($json_data, true);

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Portfolio Data</title>';
echo '<style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
      </style>';
echo '</head>';
echo '<body>';

// Education Section
echo '<h1>Education</h1>';
echo '<table>';
echo '<thead><tr><th>ID</th><th>Degree</th><th>University</th><th>Year</th></tr></thead>';
echo '<tbody>';
foreach ($data['education'] as $education) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($education['id']) . '</td>';
    echo '<td>' . htmlspecialchars($education['degree']) . '</td>';
    echo '<td>' . htmlspecialchars($education['university']) . '</td>';
    echo '<td>' . htmlspecialchars($education['year']) . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

// Certificates Section
echo '<h1>Certificates</h1>';
echo '<table>';
echo '<thead><tr><th>ID</th><th>Certificate Name</th><th>Date</th></tr></thead>';
echo '<tbody>';
foreach ($data['certificates'] as $certificate) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($certificate['id']) . '</td>';
    echo '<td>' . htmlspecialchars($certificate['name']) . '</td>';
    echo '<td>' . htmlspecialchars($certificate['date']) . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

// Projects Section
echo '<h1>Projects</h1>';
echo '<table>';
echo '<thead><tr><th>ID</th><th>Project Title</th><th>Description</th></tr></thead>';
echo '<tbody>';
foreach ($data['projects'] as $project) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($project['id']) . '</td>';
    echo '<td>' . htmlspecialchars($project['title']) . '</td>';
    echo '<td>' . htmlspecialchars($project['description']) . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

echo '</body>';
echo '</html>';
?>
