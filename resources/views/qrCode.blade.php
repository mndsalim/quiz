<div dir="rtl" style="width: 200px; float: right; direction: rtl;">
	<h3 style="text-align: center; margin-right: 90px;">إبتدائية ١٠٧</h3>
	<div style=" width: 200px; position: absolute;">
		<div style="margin-top: 10px;">{{ $student->name }}</div>
		<div style="margin-top: 10px;">{{ $student->phone }}</div>
		<div style="margin-top: 10px;">{{ $student->address }}</div>
	</div>
	<div style="margin-right: 205px; margin-top: 10px; position: absolute;" id="qrcode_img"></div>

</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="../../scripts/jquery-qrcode-0.17.0.js"></script>
  <!-- End custom js for this page-->


<script>
	$(document).ready(function(){




		$("#qrcode_img").qrcode({

			// render method: 'canvas', 'image' or 'div'
		    render: 'canvas',

		    // version range somewhere in 1 .. 40
		    minVersion: 1,
		    maxVersion: 40,

		    // error correction level: 'L', 'M', 'Q' or 'H'
		    ecLevel: 'L',

		    // offset in pixel if drawn onto existing canvas
		    left: 0,
		    top: 0,

		    // size in pixel
		    size: 90,

		    // code color or image element
		    fill: '#000',

		    // background color or image element, null for transparent background
		    background: null,

		    // content
		    text: '{{ $student->remember_token }}',

		    // corner radius relative to module width: 0.0 .. 0.5
		    radius: 0,

		    // quiet zone in modules
		    quiet: 0,

		    // modes
		    // 0: normal
		    // 1: label strip
		    // 2: label box
		    // 3: image strip
		    // 4: image box
		    mode: 3,

		    mSize: 0.2,
		    mPosX: 0.5,
		    mPosY: 0.5,

		    label: 'no label',
		    fontname: 'sans',
		    fontcolor: '#000',

		    image: '/images/logo.png'
		});


	});

</script>
