import React from 'react';
import '../Styles/Navbar.css';

const Navbar = ({lang, setLang, editorTheme,
				setEditorTheme, fontSize, setFontSize}) => {
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
	return (
		<div>
            
			{/* <h1>Geeks Code Compiler</h1>
			<Select options={languages} value={lang}
					onChange={(e) => setLang(e.value)}
					placeholder={lang} />
			<Select options={themes} value={editorTheme}
					onChange={(e) => setEditorTheme(e.value)}
					placeholder={editorTheme} /> */}
            <nav class="navbar navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href='https://abhikshil.offyoucode.co.uk/Placements%20App/mainloginpage.php' style={{color:"white", fontFamily:""}}>Online Coding Platform</a>
    <form class="d-flex">
		<label style={{margin:"1%", marginRight:"10px"}}>Language:</label>
        <select
          name="category"
          className="form-control"
          onChange={(e) => setLang(e.target.value)}
		  style={{width:"200px",textAlign:"center"}}
		//   value={lang}
		  placeholder={lang}
        >
          {/* <option>Please select</option> */}
          {languages.length > 0 &&
            languages.map((c) => (
              <option key={c.label} value={c.value}>
                {c.label}
              </option>
            ))}
        </select>
		<label style={{margin:"1%", marginRight:"10px"}}>Theme:</label>
        <select
          name="category"
          className="form-control"
          onChange={(e) => setEditorTheme(e.target.value)}
		  style={{width:"200px",textAlign:"center"}}
		//   value={lang}
		  placeholder={lang}
        >
          {/* <option>Please select</option> */}
          {themes.length > 0 &&
            themes.map((c) => (
              <option key={c.label} value={c.value}>
                {c.label}
              </option>
            ))}
        </select>
		<label style={{margin:"1%", marginRight:"10px"}}>Font:</label>	
      <input type="range" min="18" max="30"
        value={fontSize} step="2" style={{width:"150px"}}
        onChange={(e) => { setFontSize(e.target.value)}}/>
    </form>
  </div>
</nav>
		</div>
	)
}

export default Navbar
