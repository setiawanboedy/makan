<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('frontend/lib/wow/wow.min.js')}}"></script>
<script src="{{url('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{url('frontend/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{url('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{url('frontend/js/main.js')}}"></script>


<script>
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('nav ul li a').
    forEach(link => {
        if (link.href.includes(`${activePage}`)) {
            // link.classList.add('active');
            console.log(`${activePage}`)
        }
    })
</script>
