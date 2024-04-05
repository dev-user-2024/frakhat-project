import { Toaster } from "react-hot-toast";
import Routes from "./routes";
import "./App.css";


function App() {
  return (
    <div className="App">
      <Routes />
      <Toaster position="top-right" />
    </div>
  );
}

export default App;
