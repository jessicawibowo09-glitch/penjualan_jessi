<!-- admin/footer.php -->
<footer class="footer-dark">
  <div class="footer-container">
    <div class="footer-section">
      <h3>ABOUT COMPANY</h3>
      <p>
       Sistem Penjualan Skanega membantu mengelola transaksi barang secara efisien.
       Mulai dari pencatatan stok, pembeli, transaksi hingga laporan penjualan, semua bisa dipantau dengan mudah dalam satu sistem.
      </p>
      <div class="social-icons">
        <a href="#"><span>🌐</span></a>
        <a href="#"><span>📘</span></a>
        <a href="#"><span>📷</span></a>
        <a href="#"><span>✉️</span></a>
      </div>
    </div>

    <div class="footer-section">
      <h3>CONTACT US</h3>
      <form>
        <input type="text" placeholder="Search products...">
      </form>
      <p>📍 Semarang, Indonesia</p>
      <p>✉️ support@penjualanjjw.com</p>
      <p>📞 +62 812-3456-7890</p>
    </div>

    <div class="footer-section">
      <h3>OPENING HOURS</h3>
      <p>Mon - Thu: <span>9am - 6pm</span></p>
      <p>Fri - Sat: <span>9am - 8pm</span></p>
      <p>Sunday: <span>Closed</span></p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> Sistem Informasi Penjualan. All rights reserved.</p>
  </div>
</footer>

<style>
  .footer-dark {
    background-color: #db3b99ff;
    color: #eee;
    padding: 40px 20px 10px;
    font-family: 'Segoe UI', sans-serif;
    margin-top: 50px;
  }

  .footer-container {
    display: flex;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: auto;
    justify-content: space-between;
  }

  .footer-section {
    flex: 1 1 300px;
    margin: 20px;
  }

  .footer-section h3 {
    margin-bottom: 15px;
    font-size: 16px;
    color: #fff;
  }

  .footer-section p, .footer-section span {
    font-size: 14px;
    color: #ccc;
    margin: 5px 0;
  }

  .footer-section input {
    padding: 8px;
    width: 100%;
    border: none;
    border-radius: 4px;
    margin-bottom: 10px;
  }

  .social-icons a {
    display: inline-block;
    margin-right: 10px;
    font-size: 18px;
    color: #fff;
    text-decoration: none;
  }

  .footer-bottom {
    text-align: center;
    border-top: 1px solid #444;
    padding-top: 15px;
    font-size: 13px;
    color: #999;
    margin-top: 20px;
  }

  @media (max-width: 768px) {
    .footer-container {
      flex-direction: column;
      align-items: center;
    }

    .footer-section {
      text-align: center;
      margin: 20px 0;
    }
  }
</style>
