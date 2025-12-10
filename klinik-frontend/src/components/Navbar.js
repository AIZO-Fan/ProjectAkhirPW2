import { Link } from "react-router-dom";

export default function Navbar() {
  return (
    <nav style={{ padding: "10px", background: "#eee" }}>
      <Link to="/" style={{ marginRight: "10px" }}>Home</Link>
      <Link to="/doctor" style={{ marginRight: "10px" }}>Dokter</Link>
      <Link to="/pasien" style={{ marginRight: "10px" }}>Pasien</Link>
      <Link to="/obat" style={{ marginRight: "10px" }}>Obat</Link>
      <Link to="/login">Logout</Link>
    </nav>
  );
}
