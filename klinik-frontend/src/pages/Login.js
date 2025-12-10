import React, { useState } from "react";
import "../index.css";

export default function Login() {
  return (
    <div className="container">
      <div className="form-box">
        <h2>Login Klinik</h2>

        <label>Email</label>
        <input type="email" placeholder="Masukkan email" />

        <label>Password</label>
        <input type="password" placeholder="Masukkan password" />

        <button>Login</button>

        <p style={{ marginTop: "10px" }}>
          Belum punya akun? <a href="/register">Register</a>
        </p>
      </div>
    </div>
  );
}
