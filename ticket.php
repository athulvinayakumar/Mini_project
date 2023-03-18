<div class="ticket">
  <div class="ticket-header">
    <h2>Movie Ticket</h2>
  </div>
  <div class="ticket-body">
    <div class="ticket-info">
      <p><strong>Name:</strong> John Doe</p>
      <p><strong>Movie:</strong> The Avengers</p>
      <p><strong>Date:</strong> May 1, 2023</p>
      <p><strong>Time:</strong> 7:00 PM</p>
      <p><strong>Seat:</strong> A1</p>
    </div>
  </div>
</div>
<button class="print-ticket">Print Ticket</button>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<style>
.ticket {
  width: 400px;
  height: 200px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: Arial, sans-serif;
}

.ticket-header {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  text-align: center;
}

.ticket-header h2 {
  margin: 0;
}

.ticket-body {
  padding: 20px;
}

.ticket-info p {
  margin: 0;
  font-size: 16px;
  line-height: 1.5;
}
</style>
<script>
$(document).ready(function() {
  $('.print-ticket').click(function() {
    window.print();
  });
});
</script>