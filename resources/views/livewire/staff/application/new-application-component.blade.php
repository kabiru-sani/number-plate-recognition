<div>
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Application and Data Form</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('staff.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Application and Data Form</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            Select
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Export List</a>
                            <a class="dropdown-item" href="#">Policies</a>
                            <a class="dropdown-item" href="#">View Assets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pd-20 card-box mb-30">
            <div class="wizard-content">
                <form class="tab-wizard wizard-circle wizard">
                    <h5>Personal Info</h5>
                    <section>
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address:</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number(s):</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender:</label>
                                    <select class="custom-select form-control">
                                        <option value="">Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <input type="text" class="form-control date-picker" placeholder="Select Date">
                                </div>
                            </div>

                            <!-- Occupation -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Occupation:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Nationality -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nationality:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- IPPIS NO -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>IPPIS Number:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Current Residential Address -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Current Residential Address:</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Means of Identification -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Means of Identification:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- BRM ID / Service No -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>BRM ID Number / Service Number:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Employment Type -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Employment Type:</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="employmentType"
                                                    value="public">
                                                <label class="form-check-label">Public Sector</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="employmentType"
                                                    value="private">
                                                <label class="form-check-label">Private</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="employmentType"
                                                    value="self">
                                                <label class="form-check-label">Self-Employment</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="employmentType"
                                                    value="others">
                                                <label class="form-check-label">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Place of Work -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Place of Work:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Post / Rank -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Post / Rank:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Issued By -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Issued By:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Expiry Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiry Date:</label>
                                    <input type="text" class="form-control date-picker" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 2 -->
                    <h5>Land Details</h5>
                    <section>
                        <div class="row">
                            <!-- Location of Land -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location of Land:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Plot Size -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Plot Size:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Plot Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Plot Number (if allocated):</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Total Price -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total Price (₦):</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <!-- Initial Deposit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Initial Deposit (₦):</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <!-- Balance (18 Months) -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Balance (to be paid over 18 months) (₦):</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <!-- Monthly Installment -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Monthly Installment Amount (₦):</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <!-- Payment Start Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Start Date:</label>
                                    <input type="text" class="form-control date-picker" placeholder="Select Date">
                                </div>
                            </div>

                            <!-- Expected Completion Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expected Completion Date:</label>
                                    <input type="text" class="form-control date-picker" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 3 -->
                    <h5>Next of Kin</h5>
                    <section>
                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Relationship -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Relationship:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender:</label>
                                    <select class="custom-select form-control">
                                        <option value="">Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- State of Origin -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State of Origin:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Local Government Area -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Local Government Area:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Place of Work -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Place of Work:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Employment Type -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Employment Type:</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="nok_employment_type"
                                                    value="public">
                                                <label class="form-check-label">Public Sector</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="nok_employment_type"
                                                    value="private">
                                                <label class="form-check-label">Private</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="nok_employment_type"
                                                    value="self">
                                                <label class="form-check-label">Self-Employment</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="nok_employment_type"
                                                    value="others">
                                                <label class="form-check-label">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 4 -->
                    <h5>Mode of Payment</h5>
                    <section>
                        <div class="row">
                            <!-- Cash Payment -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cash Payment (₦):</label>
                                    <input type="number" class="form-control" placeholder="Enter cash payment amount">
                                </div>
                            </div>

                            <!-- Installment Payment on Loan Basis -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Installment Payment on Loan Basis (₦):</label>
                                    <input type="number" class="form-control"
                                        placeholder="Enter loan-based installment amount">
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 5 -->
                    <h5>Declaration</h5>
                    <section>
                        <div class="row">
                            <!-- Declaration Text -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Declaration:</label>
                                    <p class="form-control" style="height: auto;">
                                        I, <input type="text" class="form-control d-inline-block"
                                            style="width: auto; display: inline; border: none; border-bottom: 1px solid #ccc; border-radius: 0;"
                                            placeholder="Full Name"> the undersigned, hereby declare that the
                                        information provided above is true and correct. I agree to abide by the terms
                                        and conditions of <strong>S.I and Billionaires Hub Nig. Ltd</strong> regarding
                                        the installment payment plan. I understand that defaulting in payment may result
                                        in revocation of the allocated land.
                                    </p>
                                </div>
                            </div>

                            <!-- Signature -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Signature of Applicant:</label>
                                    <input type="text" class="form-control" placeholder="Type or draw your name">
                                </div>
                            </div>

                            <!-- Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <input type="text" class="form-control date-picker" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>

        <!-- success Popup html Start -->
        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h3 class="mb-20">Application Submitted!</h3>
                        <div class="mb-30 text-center"><img src="{{ asset('admin/vendors/images/success.png') }}"></div>
                        Your application has been submitted successfully! Our team will review your information
                        and follow up shortly. Thank you for choosing S.I and Billionaires Hub Nig. Ltd.
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- success Popup html End -->
    </div>
</div>