<x-admin-layout>
    <title>Manajemen Pesanan</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9fafb;
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

      /* .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      } */

      .header h3 {
        font-size: 24px;
        color: #1f2937;
        font-weight: 600;
      }

      .table-container {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      table th, table td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #e5e7eb;
      }

      table th {
        background-color: #f3f4f6;
        color: #374151;
        font-weight: 600;
      }

      table tr:hover {
        background-color: #f9fafb;
      }

      .status {
        font-size: 14px;
        padding: 5px 12px;
        border-radius: 20px;
        display: inline-block;
      }

      .waiting {
        background-color: #fef3c7;
        color: #92400e;
      }

      .processed {
        background-color: #d1fae5;
        color: #065f46;
      }

      .shipped {
        background-color: #bfdbfe;
        color: #1d4ed8;
      }

      .completed {
        background-color: #fde2e4;
        color: #b91c1c;
      }

      .rejected {
        background-color: #fee2e2;
        color: #b91c1c;
      }

      .action {
        display: flex;
        gap: 8px;
      }

      .action button {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
      }

      .btn-process {
        background-color: #34d399;
        color: #ffffff;
      }

      .btn-ship {
        background-color: #60a5fa;
        color: #ffffff;
      }

      .btn-complete {
        background-color: #f87171;
        color: #ffffff;
      }

      .btn-reject {
        background-color: #f43f5e;
        color: #ffffff;
      }

      .action button:hover {
        opacity: 0.9;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2 class="text-gray-700 text-3xl font-medium font-bold">Manajemen Pesanan</h2>
      {{-- <div class="header">
      </div> --}}
      <div class="table-container mt-8">
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
                  <input type="hidden" value="process" name="status">
                  <button type="submit" class="btn-process">Proses</button>
                </form>
                <form method="POST" action="/admin/pesanan/update/{{$order->id}}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" value="shipped" name="status">
                  <button type="submit" class="btn-ship">Kirim</button>
                </form>
                <form method="POST" action="/admin/pesanan/update/{{$order->id}}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" value="delivered" name="status">
                  <button type="submit" class="btn-complete">Selesai</button>
                </form>
                <form method="POST" action="/admin/pesanan/update/{{$order->id}}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" value="failed" name="status">
                  <button type="submit" class="btn-reject">Tolak</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </body>
  </html>
</x-admin-layout>
