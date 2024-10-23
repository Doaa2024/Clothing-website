<!DOCTYPE html>
<style>
  footer {
    background-color: transparent;
    /* White background */
    color: black;
    /* Black text color */
    padding: 1rem 0;
    /* Adjust padding as needed */
  }

  footer a {
    color: black;
    /* Black color for links */
    text-decoration: none;
    /* Remove underline from links */
    margin: 0 0.5rem;
    /* Adjust margin between links */
  }

  footer a:hover {
    text-decoration: underline;
    color: grey;
    /* Underline links on hover */
  }

  footer a[href="#privacy-policy"],
  footer a[href="#terms-conditions"] {
    text-decoration: underline;
    /* Underline policy and terms */
  }

  .bg {
    background-color: whitesmoke !important;
  }
</style>


<footer class="py-4 bg mt-auto">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted">Copyright &copy; Your Website 2023</div>
      <div>
        <a href="#">Privacy Policy</a>
        &middot;
        <a href="#">Terms &amp; Conditions</a>
      </div>
    </div>
  </div>
</footer>