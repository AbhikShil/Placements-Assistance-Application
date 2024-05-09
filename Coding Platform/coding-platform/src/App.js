import { useState } from 'react';
import Axios from 'axios';
import './App.css';
import Editor from "@monaco-editor/react";
import Navbar from './Components/navbar';
import InputBox from './Components/inputbox';
import OutputBox from './Components/outputbox';
import Select from 'react-select';

function App() {
  //Theme of editor
  const [editorTheme, setEditorTheme]= useState("light");
  //Set Loading When Editor and Output are processing
  const [loading, setLoading] = useState(false);
  //User Code
  const [code, setCode] = useState(``);
  //Font Size In Editor
  const [fontSize, setFontSize] = useState(15);
  //Programming Language
  const [lang, setLang] = useState("c");
  //Provide Input If Required
  const [codeInput, setCodeInput] = useState("");
  //Compiled Code Output
  const [codeOutput, setCodeOutput] = useState("");
  const options = {
	  fontSize: fontSize
  }
  const languages = [
		{ value: "c", label: "C" },
		{ value: "cpp", label: "C++" },
		{ value: "python", label: "Python" },
		{ value: "java", label: "Java" },
	];
	const themes = [
		{ value: "vs-dark", label: "Dark" },
		{ value: "light", label: "Light" },
	]

  function compile() {
	  setLoading(true);
	  if (code === ``) {
	    return
	  }

	  //Post request to the backend to complile the code 
	  Axios.post(`http://localhost:8000/execute`, {
      code: code,
	    language: lang,
	    input: codeInput }).then((res) => {
	    setCodeOutput(res.data.output);
	    }).then(() => {
	      setLoading(false);
	    })
    }

  function clearOutput() {
	  setCodeOutput("");
  }

return (
	<div className="App">
	<Navbar
		lang={lang} setLang={setLang}
		editorTheme={editorTheme} setEditorTheme={setEditorTheme}
		fontSize={fontSize} setFontSize={setFontSize}
	/>
  <div className='row controlsContainer'>
    <div className='column langController'>
      <h5>Select Language:</h5>
      <Select options={languages} value={lang}
        onChange={(e) => setLang(e.value)}
        placeholder={lang}/>
    </div>
    <div className='column fontController'>
      <h5>Font Size:</h5>
      <input type="range" min="18" max="30"
        value={fontSize} step="2" style={{width:"300px"}}
        onChange={(e) => { setFontSize(e.target.value)}}/>
    </div>
    <div className='column themeController'>
      <h5>Select Theme:</h5>
      <Select options={themes} value={editorTheme}
        onChange={(e) => setEditorTheme(e.value)}
        placeholder={editorTheme} />
    </div>
  </div>
	<div className="main">
		<div className="top-container">
		<Editor
			options={options}
			height="calc(60vh - 50px)"
			width="100%"
			theme={editorTheme}
			language={lang}
			defaultLanguage="c"
			defaultValue="# Enter your code here"
			onChange={(value) => { setCode(value) }}
		/>
		</div>
    <div class="btn-container">
      <div class="btn-center">
        <button type="button" className="btn btn-success run" onClick={() => compile()}>
			    Run
		  </button>
    </div>
  </div>
		<div className="bottom-container">
		{/* <h4>Input:</h4>
		<InputBox setCodeInput={setCodeInput}/>
		<h4>Output:</h4>
		<OutputBox loading={loading} clearOutput={clearOutput} codeOutput={codeOutput}/> */}
      <div class="row g-2">
        <div className="col-md">
        <h5>Input:</h5>
		      <InputBox setCodeInput={setCodeInput}/>
      </div>
      <div className="col-md">
        <h5>Output:</h5>
		    <OutputBox loading={loading} clearOutput={clearOutput} codeOutput={codeOutput}/>
      </div>
    </div>
		</div>

	</div>
	</div>
);
}

export default App;
