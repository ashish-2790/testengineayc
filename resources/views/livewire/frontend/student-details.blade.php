<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->

        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-10 mx-auto mb-lg-32">
                        <!-- Profile picture -->
                        <div class="card shadow border-0 mt-4 mb-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="avatar avatar-lg bg-warning rounded-circle text-white">
                                                <img alt="..."
                                                     src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
                                            </a>
                                            <div class="ms-4">
                                                <span class="h4 d-block mb-0">{{$student->name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-6">
                            <div class="col-md-12">
                                <div class="card shadow border-0">
                                    <div class="card-body d-flex align-items-center">
                                        <form class="mb-6">
                                            <div class="row mb-5">
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label class="form-label" for="first_name">Full Name</label>
                                                        <input type="text" class="form-control" name="full_name" wire:model="full_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label class="form-label" for="last_name">Date of Birth:
                                                        </label>
                                                        <input type="date" class="form-control" id="dob"  wire:model="dob">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-5">
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" class="form-control" id="email"  wire:model="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label class="form-label" for="phone_number">Phone</label>
                                                        <input type="tel" class="form-control" id="phone" wire:model="phone">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="">
                                                        <label class="form-label" for="address">Address</label>
                                                        <input type="text" class="form-control" id="address" wire:model="address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label class="form-label" for="city">School Name</label>
                                                        <select class="form-select" id="country" placeholder="Your email"
                                                                aria-label="Default select example" wire:model="school_id">
                                                            <option selected>Country</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label class="form-label" for="country">Class</label>
                                                        <select class="form-select" id="country" placeholder="Your email"
                                                                aria-label="Default select example" wire:model="class_id">
                                                            <option selected>Country</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="">
                                                            <label class="form-label" for="country">Gender - </label>
                                                            <input type="radio" id="gender" name="gender" value="male" wire:model="gender">
                                                            <label for="appearing">Male</label>
                                                            <input type="radio" id="gender" name="gender" value="female" wire:model="gender">
                                                            <label for="completed">Female</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="">
                                                            <label class="form-label" for="country">Physical Status - </label>
                                                            <input type="radio" id="fit" name="fit" value="fit" wire:model="physical_status">
                                                            <label for="appearing">Fit</label>
                                                            <input type="radio" id="handicapped" name="handicapped" value="handicapped" wire:model="physical_status">
                                                            <label for="completed">Handicapped</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="">
                                                            <label class="form-label" for="country">Qualification Status - </label>
                                                            <input type="radio" id="appearing" name="appearing" value="appearing" wire:model="qualification_status">
                                                            <label for="appearing">Appearing</label>
                                                            <input type="radio" id="completed" name="completed" value="completed" wire:model="qualification_status">
                                                            <label for="completed">Completed</label>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-12">
                                                    <div class="container">
                                                        <h5>Academic Details:</h5>
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>8th Grade</th>
                                                                <th>9th Grade</th>
                                                                <th>10th Grade</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">Aggregate</th>
                                                                <td><input type="text" class="form-control" wire:model="aggregate_8th"
                                                                           placeholder="Enter Aggregate"></td>
                                                                <td><input type="text" class="form-control" wire:model="aggregate_9th"
                                                                           placeholder="Enter Aggregate"></td>
                                                                <td><input type="text" class="form-control" wire:model="aggregate_10th"
                                                                           placeholder="Enter Aggregate"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Science</th>
                                                                <td><input type="text" class="form-control" wire:model="science_8th"
                                                                           placeholder="Enter Science Grade"></td>
                                                                <td><input type="text" class="form-control" wire:model="science_9th"
                                                                           placeholder="Enter Science Grade"></td>
                                                                <td><input type="text" class="form-control" wire:model="science_10th"
                                                                           placeholder="Enter Science Grade"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Maths</th>
                                                                <td><input type="text" class="form-control" wire:model="maths_8th"
                                                                           placeholder="Enter Maths Grade"></td>
                                                                <td><input type="text" class="form-control"  wire:model="maths_9th"
                                                                           placeholder="Enter Maths Grade"></td>
                                                                <td><input type="text" class="form-control" wire:model="maths_10th"
                                                                           placeholder="Enter Maths Grade"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">English</th>
                                                                <td><input type="text" class="form-control" wire:model="english_8th"
                                                                           placeholder="Enter English Grade"></td>
                                                                <td><input type="text" class="form-control" wire:model="english_9th"
                                                                           placeholder="Enter English Grade"></td>
                                                                <td><input type="text" class="form-control" wire:model="english_10th"
                                                                           placeholder="Enter English Grade"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <hr class="my-10"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="col-md-4">
                                            <div class="">
                                                <label class="form-label" for="country">Aspired Career 1</label>
                                                <select class="form-select" name="aspired_career_1" id="aspired_career_1" wire:model="aspired_career_1">
                                                    <option value="">Select Aspired Career 1</option>
                                                    <option value="Accountant">Accountant</option>
                                                    <option value="Actor/Actress">Actor/Actress</option>
                                                    <option value="Aerospace Engineer">Aerospace Engineer</option>
                                                    <option value="Agricultural Scientist">Agricultural Scientist</option>
                                                    <option value="Air Traffic Controller">Air Traffic Controller</option>
                                                    <option value="Architect">Architect</option>
                                                    <option value="Art Director">Art Director</option>
                                                    <option value="Astronomer">Astronomer</option>
                                                    <option value="Attorney/Lawyer">Attorney/Lawyer</option>
                                                    <option value="Automotive Engineer">Automotive Engineer</option>
                                                    <option value="Baker/Pastry Chef">Baker/Pastry Chef</option>
                                                    <option value="Banker">Banker</option>
                                                    <option value="Biomedical Engineer">Biomedical Engineer</option>
                                                    <option value="Botanist">Botanist</option>
                                                    <option value="Chef/Cook">Chef/Cook</option>
                                                    <option value="Chemical Engineer">Chemical Engineer</option>
                                                    <option value="Civil Engineer">Civil Engineer</option>
                                                    <option value="Clinical Psychologist">Clinical Psychologist</option>
                                                    <option value="Computer Programmer">Computer Programmer</option>
                                                    <option value="Construction Manager">Construction Manager</option>
                                                    <option value="Content Writer/Copywriter">Content Writer/Copywriter
                                                    </option>
                                                    <option value="Corporate Trainer">Corporate Trainer</option>
                                                    <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
                                                    <option value="Data Analyst">Data Analyst</option>
                                                    <option value="Dental Hygienist">Dental Hygienist</option>
                                                    <option value="Dermatologist">Dermatologist</option>
                                                    <option value="Dietitian/Nutritionist">Dietitian/Nutritionist</option>
                                                    <option value="Economist">Economist</option>
                                                    <option value="Electrician">Electrician</option>
                                                    <option value="Environmental Scientist">Environmental Scientist</option>
                                                    <option value="Event Planner">Event Planner</option>
                                                    <option value="Fashion Designer">Fashion Designer</option>
                                                    <option value="Financial Advisor">Financial Advisor</option>
                                                    <option value="Firefighter">Firefighter</option>
                                                    <option value="Flight Attendant">Flight Attendant</option>
                                                    <option value="Forensic Scientist">Forensic Scientist</option>
                                                    <option value="Graphic Designer">Graphic Designer</option>
                                                    <option value="Human Resources Manager">Human Resources Manager</option>
                                                    <option value="Interior Designer">Interior Designer</option>
                                                    <option value="Investment Banker">Investment Banker</option>
                                                    <option value="Journalist">Journalist</option>
                                                    <option value="Landscape Architect">Landscape Architect</option>
                                                    <option value="Librarian">Librarian</option>
                                                    <option value="Marketing Manager">Marketing Manager</option>
                                                    <option value="Mechanical Engineer">Mechanical Engineer</option>
                                                    <option value="Medical Doctor">Medical Doctor</option>
                                                    <option value="Nurse">Nurse</option>
                                                    <option value="Occupational Therapist">Occupational Therapist</option>
                                                    <option value="Paramedic">Paramedic</option>
                                                    <option value="Pharmacist">Pharmacist</option>
                                                    <option value="Photographer">Photographer</option>
                                                    <option value="Physical Therapist">Physical Therapist</option>
                                                    <option value="Pilot">Pilot</option>
                                                    <option value="Police Officer">Police Officer</option>
                                                    <option value="Political Scientist">Political Scientist</option>
                                                    <option value="Product Manager">Product Manager</option>
                                                    <option value="Public Relations Specialist">Public Relations
                                                        Specialist
                                                    </option>
                                                    <option value="Real Estate Agent">Real Estate Agent</option>
                                                    <option value="Registered Nurse">Registered Nurse</option>
                                                    <option value="Research Scientist">Research Scientist</option>
                                                    <option value="Sales Representative">Sales Representative</option>
                                                    <option value="School Counselor">School Counselor</option>
                                                    <option value="Social Worker">Social Worker</option>
                                                    <option value="Software Developer">Software Developer</option>
                                                    <option value="Speech-Language Pathologist">Speech-Language
                                                        Pathologist
                                                    </option>
                                                    <option value="Sports Coach/Trainer">Sports Coach/Trainer</option>
                                                    <option value="Surgeon">Surgeon</option>
                                                    <option value="Teacher/Educator">Teacher/Educator</option>
                                                    <option value="Technical Writer">Technical Writer</option>
                                                    <option value="Urban Planner">Urban Planner</option>
                                                    <option value="Veterinarian">Veterinarian</option>
                                                    <option value="Web Developer">Web Developer</option>
                                                    <option value="Wildlife Biologist">Wildlife Biologist</option>
                                                    <option value="Yoga Instructor">Yoga Instructor</option>
                                                    <option value="Zoologist">Zoologist</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="col-md-4">
                                            <div class="">
                                                <label class="form-label" for="country">Aspired Career 2</label>
                                                <select class="form-select" name="aspired_career_2" id="aspired_career_2" wire:model="aspired_career_2">
                                                    <option value="">Select Aspired Career 2</option>
                                                    <option value="Accountant">Accountant</option>
                                                    <option value="Actor/Actress">Actor/Actress</option>
                                                    <option value="Aerospace Engineer">Aerospace Engineer</option>
                                                    <option value="Agricultural Scientist">Agricultural Scientist</option>
                                                    <option value="Air Traffic Controller">Air Traffic Controller</option>
                                                    <option value="Architect">Architect</option>
                                                    <option value="Art Director">Art Director</option>
                                                    <option value="Astronomer">Astronomer</option>
                                                    <option value="Attorney/Lawyer">Attorney/Lawyer</option>
                                                    <option value="Automotive Engineer">Automotive Engineer</option>
                                                    <option value="Baker/Pastry Chef">Baker/Pastry Chef</option>
                                                    <option value="Banker">Banker</option>
                                                    <option value="Biomedical Engineer">Biomedical Engineer</option>
                                                    <option value="Botanist">Botanist</option>
                                                    <option value="Chef/Cook">Chef/Cook</option>
                                                    <option value="Chemical Engineer">Chemical Engineer</option>
                                                    <option value="Civil Engineer">Civil Engineer</option>
                                                    <option value="Clinical Psychologist">Clinical Psychologist</option>
                                                    <option value="Computer Programmer">Computer Programmer</option>
                                                    <option value="Construction Manager">Construction Manager</option>
                                                    <option value="Content Writer/Copywriter">Content Writer/Copywriter
                                                    </option>
                                                    <option value="Corporate Trainer">Corporate Trainer</option>
                                                    <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
                                                    <option value="Data Analyst">Data Analyst</option>
                                                    <option value="Dental Hygienist">Dental Hygienist</option>
                                                    <option value="Dermatologist">Dermatologist</option>
                                                    <option value="Dietitian/Nutritionist">Dietitian/Nutritionist</option>
                                                    <option value="Economist">Economist</option>
                                                    <option value="Electrician">Electrician</option>
                                                    <option value="Environmental Scientist">Environmental Scientist</option>
                                                    <option value="Event Planner">Event Planner</option>
                                                    <option value="Fashion Designer">Fashion Designer</option>
                                                    <option value="Financial Advisor">Financial Advisor</option>
                                                    <option value="Firefighter">Firefighter</option>
                                                    <option value="Flight Attendant">Flight Attendant</option>
                                                    <option value="Forensic Scientist">Forensic Scientist</option>
                                                    <option value="Graphic Designer">Graphic Designer</option>
                                                    <option value="Human Resources Manager">Human Resources Manager</option>
                                                    <option value="Interior Designer">Interior Designer</option>
                                                    <option value="Investment Banker">Investment Banker</option>
                                                    <option value="Journalist">Journalist</option>
                                                    <option value="Landscape Architect">Landscape Architect</option>
                                                    <option value="Librarian">Librarian</option>
                                                    <option value="Marketing Manager">Marketing Manager</option>
                                                    <option value="Mechanical Engineer">Mechanical Engineer</option>
                                                    <option value="Medical Doctor">Medical Doctor</option>
                                                    <option value="Nurse">Nurse</option>
                                                    <option value="Occupational Therapist">Occupational Therapist</option>
                                                    <option value="Paramedic">Paramedic</option>
                                                    <option value="Pharmacist">Pharmacist</option>
                                                    <option value="Photographer">Photographer</option>
                                                    <option value="Physical Therapist">Physical Therapist</option>
                                                    <option value="Pilot">Pilot</option>
                                                    <option value="Police Officer">Police Officer</option>
                                                    <option value="Political Scientist">Political Scientist</option>
                                                    <option value="Product Manager">Product Manager</option>
                                                    <option value="Public Relations Specialist">Public Relations
                                                        Specialist
                                                    </option>
                                                    <option value="Real Estate Agent">Real Estate Agent</option>
                                                    <option value="Registered Nurse">Registered Nurse</option>
                                                    <option value="Research Scientist">Research Scientist</option>
                                                    <option value="Sales Representative">Sales Representative</option>
                                                    <option value="School Counselor">School Counselor</option>
                                                    <option value="Social Worker">Social Worker</option>
                                                    <option value="Software Developer">Software Developer</option>
                                                    <option value="Speech-Language Pathologist">Speech-Language
                                                        Pathologist
                                                    </option>
                                                    <option value="Sports Coach/Trainer">Sports Coach/Trainer</option>
                                                    <option value="Surgeon">Surgeon</option>
                                                    <option value="Teacher/Educator">Teacher/Educator</option>
                                                    <option value="Technical Writer">Technical Writer</option>
                                                    <option value="Urban Planner">Urban Planner</option>
                                                    <option value="Veterinarian">Veterinarian</option>
                                                    <option value="Web Developer">Web Developer</option>
                                                    <option value="Wildlife Biologist">Wildlife Biologist</option>
                                                    <option value="Yoga Instructor">Yoga Instructor</option>
                                                    <option value="Zoologist">Zoologist</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-sm btn-neutral me-2">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>