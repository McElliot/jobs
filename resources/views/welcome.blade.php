<x-layouts.epz-app :title="__('Home')">
    <section class="tf-slider sl1 parallax">
        <div class="tf-container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="content">
                        <div class="heading">
                            <h2 class="text-white">Find the job that fits your life</h2>
                            <p class="text-white">Resume-Library is a true performance-based job board. Enjoy custom
                                hiring
                                products
                                and access to up to 10,000 new resume registrations daily, with no subscriptions or user
                                licences.</p>
                        </div>
                        <div class="form-sl">
                            <form method="post">
                                <div class="row-group-search home1">
                                    <div class="form-group-1">
                                        <input type="text" class="input-filter-search"
                                            placeholder="Job title, key words or company">
                                    </div>
                                    <div class="form-group-2">
                                        <span class="icon-map-pin"></span>
                                        <select id="select-location" class="select-location">
                                            <option value="">All Location</option>
                                            <option value="">Singapore</option>
                                            <option value="">Japan</option>
                                            <option value="">Korea</option>
                                            <option value="">Italia</option>
                                            <option value="">Canada</option>
                                        </select>
                                    </div>
                                    <div class="form-group-4">
                                        <button type="submit" class="btn btn-find">Find Jobs</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End Job  Search Form-->
                        </div>
                        <ul class="list-category text-white">
                            <li><a href="about-us.html">Designer</a></li>
                            <li class="current"><a href="about-us.html">Developer</a></li>
                            <li><a href="about-us.html">Tester</a></li>
                            <li><a href="about-us.html">Writing</a></li>
                            <li><a href="about-us.html">Project Manager</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- END SILDER -->
</x-layouts.epz-app>