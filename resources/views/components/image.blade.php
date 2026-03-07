 <form action="" method="POST" enctype="multipart/form-data">
     @csrf

     <!-- Drag & Drop Area -->
     <div id="drop-area" class="border border-2 border-primary rounded p-5 text-center mb-3"
         style="cursor:pointer; background:#f8f9fa;">
         <p class="mb-2">Drag & Drop Images Here</p>
         <p class="text-muted">or Click to Select</p>
         <input type="file" name="images[]" id="images" multiple accept="image/*" hidden>
     </div>

     <!-- Preview Section -->
     <div class="row" id="preview"></div>

 </form>
