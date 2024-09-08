<?php  

class MyClass {
    private $server = "mysql:host=localhost;dbname=capstone";
    private $user = "root";
    private $pass = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $conn;

    public function openConnection() {
        try {
            $this->conn = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null; // Return null if connection fails
        }
    }

    public function closeConnection() {
        $this->conn = null;
    }

    public function login() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $email = trim($_POST["email"]);
          $password = trim($_POST['password']); // Get the raw password input
  
          $connection = $this->openConnection();
          if ($connection) {
              $stmt = $connection->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
              $stmt->execute([$email]);
              $user = $stmt->fetch();
              $total = $stmt->rowCount();
  
              // Debugging: Log fetched user data and password hash
              echo "<script>console.log('Fetched User Data: " . json_encode($user) . "');</script>";
              echo "<script>console.log('Raw Password: " . htmlspecialchars($password) . "');</script>";
              echo "<script>console.log('Stored Password Hash: " . htmlspecialchars($user['password']) . "');</script>";
  
              // Verify that the user exists and the password matches
              if ($total > 0 && password_verify($password, $user['password'])) {
                  echo "<script>console.log('Password verified successfully');</script>";
                  // Call the createSession function to start the session and set user data
                  $this->createSession($user['id'], $user['username'], $user['email']);
                  header("Location: index.php");
                  exit();
              } else {
                  echo "<script>console.log('Login failed: Incorrect email or password');</script>";
                  echo "Login failed";
              }
              $this->closeConnection();
          }
      }
  }
  

    private function createSession($user_id, $username, $email) {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Store user data in session
        $_SESSION['userdata'] = [
            'id' => $user_id,
            'username' => $username,
            'email' => $email
        ];
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['userdata'] = null;
        unset($_SESSION['userdata']);
        session_destroy(); // Optional: destroy the session entirely
    }

    public function check_user($email) {
        $connection = $this->openConnection();
        if ($connection) {
            $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->rowCount();
        }
        return 0;
    }

    public function add_user() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Hash the password
    
            if ($this->check_user($email) == 0) {
                $connection = $this->openConnection();
                if ($connection) {
                    try {
                        // Insert the user data
                        $stmt = $connection->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?)");
                        $stmt->execute([$email, $password, $username]);
    
                        // Get the User ID of the newly registered user
                        $user_id = $connection->lastInsertId();
    
                        // Create a new table for the user to store sensor data
                        $user_table = "user_" . $user_id . "_sensors";
                        $create_table_sql = "CREATE TABLE $user_table (
                            id INT(11) AUTO_INCREMENT PRIMARY KEY,
                            user_id INT(11) NOT NULL,
                            temperature FLOAT,
                            tds FLOAT,
                            turbidity FLOAT,
                            ph FLOAT,
                            timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            FOREIGN KEY (user_id) REFERENCES users(id)
                        )";
    
                        // Execute the table creation query
                        $connection->exec($create_table_sql);
    
                        echo "User registered successfully. Sensor data table created.";
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
    
                    // Close the connection
                    $this->closeConnection();
                }
            } else {
                echo "User already exists";
            }
        }
    }
    


}

// Instantiate and use the class
$class = new MyClass();

?>
