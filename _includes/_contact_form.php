<div id="contactForm" class="clearfix">    
  <form action="_includes/form_mail.php" method="post">
    <div class="formfield">
      <label>First and Last Name: *
        <input type="text" name=name required />
      </label>
    </div>
    <div class="formfield">
      <label>Email: *
        <input type="text" name=email required />
      </label>
    </div>
    <div class="formfield">
      <label>Phone Number:
        <input type="text" name=phone />
      </label>
    </div>
    <div class="formfield">
      <label>Location:
        <input type="text" name=location />
      </label>
      <sub>Example: Mechanicsburg</sub>        
    </div>
    <sub>* indicates a required field</sub>
    <div class="formfield">
      <input type="submit" name=Submit />
    </div>
  </form>
</div>