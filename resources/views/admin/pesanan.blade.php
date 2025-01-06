<x-admin-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manajemen Pesanan</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f4f5f7;
        }
    
        .pesanan {
          /* padding: 20px; */
          vertical-align: middle;
          display: inline-block;
          min-width: 100%;
          /* box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); */
          overflow: hidden;
          border-radius: 0.5rem;
          border-bottom: 1px solid #e5e7eb;
        }
    
        .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 20px;
        }
    
        .header h1 {
          font-size: 24px;
          color: #333;
        }
    
        .table-container {
          background: white;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          padding: 20px;
        }
    
        table {
          width: 100%;
          border-collapse: collapse;
        }
    
        table th, table td {
          text-align: left;
          padding: 10px;
          border-bottom: 1px solid #e0e0e0;
        }
    
        table th {
          background-color: #f9f9f9;
          color: #333;
        }
    
        table tr:hover {
          background-color: #f5f5f5;
        }
    
        .status {
          font-size: 14px;
          padding: 5px 10px;
          border-radius: 20px;
          display: inline-block;
        }
    
        .waiting {
          background-color: #ffe4b2;
          color: #995700;
        }
    
        .processed {
          background-color: #b2d8b2;
          color: #007700;
        }
    
        .shipped {
          background-color: #b2d8e8;
          color: #0077aa;
        }
    
        .completed {
          background-color: #d8b2b2;
          color: #770000;
        }
    
        .rejected {
          background-color: #f5b2b2;
          color: #aa0000;
        }
    
        .action button {
          margin-right: 5px;
          padding: 5px 10px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          font-size: 14px;
        }
    
        .btn-process {
          background-color: #b2d8b2;
          color: white;
        }
    
        .btn-ship {
          background-color: #b2d8e8;
          color: white;
        }
    
        .btn-complete {
          background-color: #d8b2b2;
          color: white;
        }
    
        .btn-reject {
          background-color: #f5b2b2;
          color: white;
        }
    
        .action button:hover {
          opacity: 0.8;
        }
      </style>
    </head>
    <body>
      <div class="pesanan">
        <div class="header">
          <h3 class="text-gray-700 text-3xl font-medium">Manajemen Pesanan</h3>
        </div>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td><span class="status waiting">{{$order->delivery->status}}</span></td>
                <td class="action">
                  <form method="POST" action="/admin/pesanan/update/{{$order->id}}">
                    @csrf
                    @method('PUT')
                    <input type="text" value="process" name="status" readonly hidden>
                    <button type="submit" class="btn-process">Proses</button>
                  </form>
                  <form method="POST" action="/admin/pesanan/update/{{$order->id}}">
                    @csrf
                    @method('PUT')
                    <input type="text" value="shipped" name="status" readonly hidden>
                    <button type="submit" class="btn-ship">Kirim</button>
                  </form>
                  <form method="POST" action="/admin/pesanan/update/{{$order->id}}">
                    @csrf
                    @method('PUT')
                    <input type="text" value="delivered" name="status" readonly hidden>
                    <button type="submit" class="btn-complete">Selesai</button>
                  </form>
                  <form method="POST" action="/admin/pesanan/update/{{$order->id}}">
                    @csrf
                    @method('PUT')
                    <input type="text" value="failed" name="status" readonly hidden>
                    <button type="submit" class="btn-reject">Tolak</button>
                  </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    
      <script>
        function updateStatus(button, status) {
          const row = button.closest('tr');
          const statusElement = row.querySelector('.status');
    
          // Perbarui status berdasarkan tombol yang ditekan
          const statusClasses = ['waiting', 'processed', 'shipped', 'completed', 'rejected'];
          statusClasses.forEach(cls => statusElement.classList.remove(cls));
          statusElement.classList.add(status);
    
          // Ubah teks status
          const statusText = {
            waiting: 'Waiting',
            processed: 'Processed',
            shipped: 'Shipped',
            completed: 'Completed',
            rejected: 'Rejected'
          };
          statusElement.textContent = statusText[status];
        }
      </script>
    </body>
    </html>
</x-admin-layout>
    