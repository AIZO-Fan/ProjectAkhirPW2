import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Login from "./pages/Login";
import Register from "./pages/Register";
import Home from "./pages/Home";
import Doctor from "./pages/Doctor";
import Pasien from "./pages/Pasien";
import Obat from "./pages/Obat";
import ProtectedRoute from "./components/ProtectedRoute";
import Navbar from "./components/Navbar";

function App() {
  return (
    <Router>
      <Navbar />
      <Routes>
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />

        {/* Halaman yang butuh login */}
        <Route 
          path="/" 
          element={<ProtectedRoute><Home /></ProtectedRoute>} 
        />
        <Route 
          path="/doctor" 
          element={<ProtectedRoute><Doctor /></ProtectedRoute>} 
        />
        <Route 
          path="/pasien" 
          element={<ProtectedRoute><Pasien /></ProtectedRoute>} 
        />
        <Route 
          path="/obat" 
          element={<ProtectedRoute><Obat /></ProtectedRoute>} 
        />
      </Routes>
    </Router>
  );
}

export default App;
