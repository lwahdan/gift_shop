<?php require 'views/partials/header.php'; ?>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">My Account</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/customers/index">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                <li class="active" aria-current="page">My Account</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Account Dashboard Section:::... -->
<div class="account-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover active">Dashboard</a></li>
                        <li><a href="#orders" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Orders</a></li>
                        <li><a href="#address" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Addresses</a></li>
                        <li><a href="/customers/logout" class="nav-link btn btn-block btn-md btn-black-default-hover">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade show active" id="dashboard">
                        <section>
                            <div class="profile-form">
                                <div class="profile-table">
                                    <table>
                                        <tr>
                                            <td><strong>Username</strong></td>
                                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong></td>
                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Full Name</strong></td>
                                            <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone Number</strong></td>
                                            <td><?php echo htmlspecialchars($user['phone_number']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td><?php echo htmlspecialchars($user['address']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><button id="editProfileBtn">Edit</button></td>
                                            <td><button id="changePasswordBtn">Change Password</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="changePasswordForm" style="display:none;">
                                    <form action="/auth/changePassword" method="POST">
                                        <?php if (isset($_SESSION['message'])): ?>
                                            <div class="alert alert-dange"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success_message']); unset($_SESSION['success_message']); ?></div>
        <?php endif; ?>
        
                                        <table class="profile-table">
                                            <tr>
                                                <td><label for="current_password">Current Password:</label></td>
                                                <td><input type="password" name="current_password" id="current_password" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="new_password">New Password:</label></td>
                                                <td><input type="password" name="new_password" id="new_password" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="confirm_new_password">Confirm New Password:</label></td>
                                                <td><input type="password" name="confirm_new_password" id="confirm_new_password" required></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><button type="submit">Change Password</button></td>
                                                <td colspan="2"><button type="button" id="cancelchangeBtn">Cancel</button></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div id="editProfileForm" style="display:none;">
                                    <form action="/profile/updateProfile" method="POST">

                                        <table>
                                            <tr>
                                                <td><label for="username">Username:</label></td>
                                                <td><input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="email">Email:</label></td>
                                                <td><input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="first_name">First Name:</label></td>
                                                <td><input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="last_name">Last Name:</label></td>
                                                <td><input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="phone_number">Phone Number:</label></td>
                                                <td><input type="tel" name="phone_number" id="phone_number" value="<?php echo htmlspecialchars($user['phone_number']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="address">Address:</label></td>
                                                <td><input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['address']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="city">City:</label></td>
                                                <td><input type="text" name="city" id="city" value="<?php echo htmlspecialchars($user['city']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="postal_code">Postal Code:</label></td>
                                                <td><input type="text" name="postal_code" id="postal_code" value="<?php echo htmlspecialchars($user['postal_code']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="country">Country:</label></td>
                                                <td><input type="text" name="country" id="country" value="<?php echo htmlspecialchars($user['country']); ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><button type="submit">Save</button></td>
                                                <td colspan="2"><button type="button" id="cancelEditBtn">Cancel</button></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Other tabs (orders, downloads, address, etc.) would go here -->
                </div> <!-- end of tab content -->
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Account Dashboard Section:::... -->

<?php require 'views/partials/footer.php'; ?>

<script src="path/to/your/script.js"></script>
<script>
    document.getElementById('editProfileBtn').addEventListener('click', function() {
        document.getElementById('editProfileForm').style.display = 'block';
        document.getElementById('changePasswordForm').style.display = 'none';
    });

    document.getElementById('changePasswordBtn').addEventListener('click', function() {
        document.getElementById('changePasswordForm').style.display = 'block';
        document.getElementById('editProfileForm').style.display = 'none';
    });

    document.getElementById('cancelEditBtn').addEventListener('click', function() {
        document.getElementById('editProfileForm').style.display = 'none';

    });
    document.getElementById('cancelchangeBtn').addEventListener('click', function() {
        document.getElementById('editProfileForm').style.display = 'none';
        document.getElementById('changePasswordForm').style.display = 'none';
    });
</script>
