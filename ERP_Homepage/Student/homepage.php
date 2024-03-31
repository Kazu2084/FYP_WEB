

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
  <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
  <title>Student</title>
</head>
<body>
  <div id="root">
    <div id="app" class="logging-in">
      <!-- <div id="app-info" class="info"><span class="time"></span><span class="weather"><i class="fa-duotone fa-sun"></i><span class="weather-temperature-value">69</span><span class="weather-temperature-unit">°F</span></span></div> -->
      
      <div id="app-menu">
        <div id="app-menu-content-wrapper">
          <div id="app-menu-content">
            <div id="app-menu-content-header">
              <div class="app-menu-content-header-section">
                <div id="app-menu-info" class="info"><span class="time">1:34</span><span class="weather"><i class="fa-duotone fa-sun"></i><span class="weather-temperature-value">66</span><span class="weather-temperature-unit">°F</span></span></div>
                <div class="reminder">
                  <div class="reminder-icon"><i class="fa-regular fa-bell"></i></div><span class="reminder-text">Extra cool people meeting <span class="reminder-time">10AM</span></span>
                </div>
              </div>
              <div class="app-menu-content-header-section"><button id="sign-out-button" class="user-status-button clear-button" type="button"><i class="fa-solid fa-arrow-right-from-arc"></i></button></div>
            </div>
            <div class="scrollable-component" id="quick-nav">
              <div class="quick-nav-item clear-button"><span class="quick-nav-item-label">Weather</span></div>
              <div class="quick-nav-item clear-button"><span class="quick-nav-item-label">Food</span></div>
              <div class="quick-nav-item clear-button"><span class="quick-nav-item-label">Apps</span></div>
              <div class="quick-nav-item clear-button"><span class="quick-nav-item-label">Movies</span></div>
            </div><a id="youtube-link" class="clear-button" href="#" target="_blank"><i class="fa-brands fa-youtube"></i><span>Youtube</span></a>
            <div id="weather-section" class="menu-section">
              <div class="menu-section-title"><i class="fa-solid fa-sun"></i><span class="menu-section-title-text">How's it look out there?</span></div>
              <div class="scrollable-component menu-section-content">
                <div class="day-card">
                  <div class="day-card-content"><span class="day-weather-temperature">80<span class="day-weather-temperature-unit">°F</span></span><i class="day-weather-icon fa-duotone fa-sun sunny"></i><span class="day-name">Mon</span></div>
                </div>
                <div class="day-card">
                  <div class="day-card-content"><span class="day-weather-temperature">64<span class="day-weather-temperature-unit">°F</span></span><i class="day-weather-icon fa-duotone fa-sun sunny"></i><span class="day-name">Tues</span></div>
                </div>
                <div class="day-card">
                  <div class="day-card-content"><span class="day-weather-temperature">70<span class="day-weather-temperature-unit">°F</span></span><i class="day-weather-icon fa-duotone fa-clouds cloudy"></i><span class="day-name">Wed</span></div>
                </div>
                <div class="day-card">
                  <div class="day-card-content"><span class="day-weather-temperature">80<span class="day-weather-temperature-unit">°F</span></span><i class="day-weather-icon fa-duotone fa-cloud-drizzle rainy"></i><span class="day-name">Thurs</span></div>
                </div>
                <div class="day-card">
                  <div class="day-card-content"><span class="day-weather-temperature">67<span class="day-weather-temperature-unit">°F</span></span><i class="day-weather-icon fa-duotone fa-cloud-bolt stormy"></i><span class="day-name">Fri</span></div>
                </div>
                <div class="day-card">
                  <div class="day-card-content"><span class="day-weather-temperature">72<span class="day-weather-temperature-unit">°F</span></span><i class="day-weather-icon fa-duotone fa-sun sunny"></i><span class="day-name">Sat</span></div>
                </div>
                <div class="day-card">
                  <div class="day-card-content"><span class="day-weather-temperature">68<span class="day-weather-temperature-unit">°F</span></span><i class="day-weather-icon fa-duotone fa-clouds cloudy"></i><span class="day-name">Sun</span></div>
                </div>
              </div>
            </div>
            <div id="restaurants-section" class="menu-section">
              <div class="menu-section-title"><i class="fa-regular fa-pot-food"></i><span class="menu-section-title-text">Get it delivered!</span></div>
              <div class="menu-section-content">
                <div class="restaurant-card background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1606131731446-5568d87113aa?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YnVyZ2Vyc3xlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);">
                  <div class="restaurant-card-content">
                    <a href="http://localhost/FYP_ERP/Modules/collegeMS/login/login.php"><div class="restaurant-card-content-items"><span class="restaurant-card-title">Library</span><span class="restaurant-card-desc">The best burgers in town</span></div></a>
                  </div>
                </div>
                <div class="restaurant-card background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1576506295286-5cda18df43e7?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8aWNlJTIwY3JlYW18ZW58MHx8MHx8&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);">
                  <div class="restaurant-card-content">
                    <div class="restaurant-card-content-items"><span class="restaurant-card-title">Library</span><span class="restaurant-card-desc">The worst ice-cream around</span></div>
                  </div>
                </div>
                <div class="restaurant-card background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1590947132387-155cc02f3212?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cGl6emF8ZW58MHx8MHx8&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);">
                  <div class="restaurant-card-content">
                    <div class="restaurant-card-content-items"><span class="restaurant-card-title">Library</span><span class="restaurant-card-desc">This 'Za be gettin down</span></div>
                  </div>
                </div>
                <div class="restaurant-card background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1529193591184-b1d58069ecdd?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YmFyYmVxdWV8ZW58MHx8MHx8&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);">
                  <div class="restaurant-card-content">
                    <div class="restaurant-card-content-items"><span class="restaurant-card-title">Fees</span><span class="restaurant-card-desc">BBQ ain't need no rhyme</span></div>
                  </div>
                </div>
              </div>
            </div>
            <div id="tools-section" class="menu-section">
              <div class="menu-section-title"><i class="fa-solid fa-toolbox"></i><span class="menu-section-title-text">What's Appening?</span></div>
              <div class="menu-section-content">
                <div class="tool-card">
                  <div class="tool-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1492011221367-f47e3ccd77a0?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fHdlYXRoZXJ8ZW58MHx8MHx8&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="tool-card-content">
                    <div class="tool-card-content-header"><span class="tool-card-label">Weather</span><span class="tool-card-name">Cloudly</span></div><i class="fa-solid fa-cloud-sun tool-card-icon"></i>
                  </div>
                </div>
                <div class="tool-card">
                  <div class="tool-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1587145820266-a5951ee6f620?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y2FsY3VsYXRvcnxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="tool-card-content">
                    <div class="tool-card-content-header"><span class="tool-card-label">Calc</span><span class="tool-card-name">Mathio</span></div><i class="fa-solid fa-calculator-simple tool-card-icon"></i>
                  </div>
                </div>
                <div class="tool-card">
                  <div class="tool-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1579621970588-a35d0e7ab9b6?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8YmFua3xlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="tool-card-content">
                    <div class="tool-card-content-header"><span class="tool-card-label">Bank</span><span class="tool-card-name">Cashy</span></div><i class="fa-solid fa-piggy-bank tool-card-icon"></i>
                  </div>
                </div>
                <div class="tool-card">
                  <div class="tool-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YWlycGxhbmV8ZW58MHx8MHx8&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="tool-card-content">
                    <div class="tool-card-content-header"><span class="tool-card-label">Travel</span><span class="tool-card-name">Fly-er-io-ly</span></div><i class="fa-solid fa-plane tool-card-icon"></i>
                  </div>
                </div>
                <div class="tool-card">
                  <div class="tool-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1612287230202-1ff1d85d1bdf?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dmlkZW8lMjBnYW1lc3xlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="tool-card-content">
                    <div class="tool-card-content-header"><span class="tool-card-label">Games</span><span class="tool-card-name">Gamey</span></div><i class="fa-solid fa-gamepad-modern tool-card-icon"></i>
                  </div>
                </div>
                <div class="tool-card">
                  <div class="tool-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1578022761797-b8636ac1773c?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fHZpZGVvJTIwY2hhdHxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="tool-card-content">
                    <div class="tool-card-content-header"><span class="tool-card-label">Video Chat</span><span class="tool-card-name">Chatty</span></div><i class="fa-solid fa-video tool-card-icon"></i>
                  </div>
                </div>
              </div>
            </div>
            <div id="movies-section" class="menu-section">
              <div class="menu-section-title"><i class="fa-solid fa-camera-movie"></i><span class="menu-section-title-text">Popcorn time!</span></div>
              <div class="scrollable-component menu-section-content">
                <div id="movie-card-1" class="movie-card">
                  <div class="movie-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1596727147705-61a532a659bd?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bWFydmVsfGVufDB8fDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="movie-card-content">
                    <div class="movie-card-info"><span class="movie-card-title">Protectors of the Milky Way</span><span class="movie-card-desc">A tale of some people watching over a large portion of space.</span></div><i class="fa-solid fa-galaxy"></i>
                  </div>
                </div>
                <div id="movie-card-2" class="movie-card">
                  <div class="movie-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1535666669445-e8c15cd2e7d9?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bG9yZCUyMG9mJTIwdGhlJTIwcmluZ3N8ZW58MHx8MHx8&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="movie-card-content">
                    <div class="movie-card-info"><span class="movie-card-title">Hole People</span><span class="movie-card-desc">Some people leave their holes to disrupt some things.</span></div><i class="fa-solid fa-hat-wizard"></i>
                  </div>
                </div>
                <div id="movie-card-3" class="movie-card">
                  <div class="movie-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1632266484284-a11d9e3a460a?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGhhcnJ5JTIwcG90dGVyfGVufDB8fDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="movie-card-content">
                    <div class="movie-card-info"><span class="movie-card-title">Pot of Hair</span><span class="movie-card-desc">A boy with a dent in his head tries to stop a bad guy. And by bad I mean bad at winning.</span></div><i class="fa-solid fa-broom-ball"></i>
                  </div>
                </div>
                <div id="movie-card-4" class="movie-card">
                  <div class="movie-card-background background-image" style="background-image: url(&quot;https://images.unsplash.com/photo-1533613220915-609f661a6fe1?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c3RhciUyMHdhcnN8ZW58MHx8MHx8&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60&quot;);"></div>
                  <div class="movie-card-content">
                    <div class="movie-card-info"><span class="movie-card-title">Area Fights</span><span class="movie-card-desc">A long drawn out story of some people fighting over some space. Cuz there isn't enough of it.</span></div><i class="fa-solid fa-starship-freighter"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="app-background">
        <div id="app-background-image" class="background-image"></div>
      </div>
      <div id="sign-in-button-wrapper"><button id="sign-in-button" class="user-status-button clear-button" type="button" disabled=""><i class="fa-solid fa-arrow-right-to-arc"></i></button></div>
      <div id="app-loading-icon"><i class="fa-solid fa-spinner-third"></i></div>
    </div>
  </div>
  <script src="student.js"></script>
</body>
</html>