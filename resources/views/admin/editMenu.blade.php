<x-admin-layout>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9fafb;
      }

      .table-container {
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
  
      .container {
        /* padding: 20px; */
        vertical-align: middle;
        display: inline-block;
        min-width: 100%;
        /* box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); */
        overflow: hidden;
        border-radius: 0.5rem;
        border-bottom: 1px solid #e5e7eb;
      }

      .header h3 {
      font-size: 24px;
      color: #1f2937;
      font-weight: 600;
    }
  
      /* h2 {
        font-size: 24px;
        color: #1f2937;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
      } */
  
      form {
        display: flex;
        flex-direction: column;
        gap: 15px;
      }
  
      label {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
      }
  
      input, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        font-size: 14px;
        color: #374151;
        background: #f9fafb;
      }
  
      input[type="file"] {
        padding: 5px;
      }
  
      input:focus, textarea:focus {
        border-color: #6366f1;
        outline: none;
      }
  
      textarea {
        resize: vertical;
        height: 100px;
      }
  
      .btn-submit {
        padding: 10px 20px;
        font-size: 16px;
        color: #ffffff;
        background-color: #6366f1;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
      }
  
      .btn-submit:hover {
        background-color: #4f46e5;
      }
  
      .back-link {
        text-align: center;
        margin-top: 20px;
      }
  
      .back-link a {
        text-decoration: none;
        color: #6366f1;
        font-weight: bold;
      }
  
      .back-link a:hover {
        color: #4f46e5;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <h2 class="text-gray-700 text-3xl font-medium font-bold">Edit Menu</h2>
      {{-- <div class="header">
      </div> --}}
      <div class="table-container mt-8">
      <form action="/admin/addMenu" method="POST" enctype="multipart/form-data">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div data-hs-file-upload='{
          "url": "/upload",
          "maxFiles": 1,
          "singleton": true
        }'>
        <label for="gambar">Gambar</label>
          <template data-hs-file-upload-preview="">
            <div class="flex items-center w-full">
              <span class="grow-0 overflow-hidden truncate" data-hs-file-upload-file-name=""></span>
              <span class="grow-0">.</span>
              <span class="grow-0" data-hs-file-upload-file-ext=""></span>
            </div>
          </template>
        
          <button type="button" class="relative flex w-full border overflow-hidden border-gray-200 shadow-sm rounded-lg text-sm focus:outline-none focus:z-10 focus:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:border-neutral-600">
            <span class="h-full py-3 px-4 bg-gray-100 text-nowrap dark:bg-neutral-800">Choose File</span>
            <span class="group grow flex overflow-hidden h-full py-3 px-4" data-hs-file-upload-previews="">
              <span class="group-has-[div]:hidden">No Chosen File</span>
            </span>
            <span class="absolute top-0 left-0 w-full h-full" data-hs-file-upload-trigger=""></span>
          </button>
        </div>
        
        <div>
          <label for="nama_menu">Nama Menu</label>
          <input type="text" id="nama_menu" name="nama_menu" placeholder="Masukkan nama menu" required>
        </div>
        <div>
          <label for="deskripsi">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi menu" required></textarea>
        </div>
        <div>
          <label for="harga">Harga</label>
          <input type="number" id="harga" name="harga" placeholder="Masukkan harga menu" required>
        </div>
        <button type="submit" class="btn-submit">Simpan</button>
      </form>
      <div class="back-link">
        <a href="/admin/menu">Kembali ke Daftar Menu</a>
      </div>
    </div>
  </div>
  </body>
  </html>
  
</x-admin-layout>