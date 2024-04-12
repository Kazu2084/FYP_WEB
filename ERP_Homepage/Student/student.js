!(function () {
    "use strict";
    var f = {}.hasOwnProperty;
    function s() {
      for (var e = [], t = 0; t < arguments.length; t++) {
        var n = arguments[t];
        if (n) {
          var r,
            o = typeof n;
          if ("string" == o || "number" == o) e.push(n);
          else if (Array.isArray(n))
            !n.length || ((r = s.apply(null, n)) && e.push(r));
          else if ("object" == o)
            if (n.toString === Object.prototype.toString)
              for (var i in n) f.call(n, i) && n[i] && e.push(i);
            else e.push(n.toString());
        }
      }
      return e.join(" ");
    }
    "undefined" != typeof module && module.exports
      ? ((s.default = s), (module.exports = s))
      : "function" == typeof define && "object" == typeof define.amd && define.amd
      ? define("classnames", [], function () {
          return s;
        })
      : (window.classNames = s);
  })();
  
  const script = document.createElement("script");
  script.src = "https://kit.fontawesome.com/944eb371a4.js";
  document.body.appendChild(script);
  
  ("use strict");
  var UserStatus;
  (function (UserStatus) {
    UserStatus["LoggedIn"] = "Logged In";
    UserStatus["LoggingIn"] = "Logging In";
    UserStatus["LoggedOut"] = "Logged Out";
    UserStatus["LogInError"] = "Log In Error";
    UserStatus["VerifyingLogIn"] = "Verifying Log In";
  })(UserStatus || (UserStatus = {}));
  var Default;
  (function (Default) {
    Default["PIN"] = "0001";
  })(Default || (Default = {}));
  var WeatherType;
  (function (WeatherType) {
    WeatherType["Cloudy"] = "Cloudy";
    WeatherType["Rainy"] = "Rainy";
    WeatherType["Stormy"] = "Stormy";
    WeatherType["Sunny"] = "Sunny";
  })(WeatherType || (WeatherType = {}));
  const defaultPosition = () => ({
    left: 0,
    x: 0
  });
  const N = {
    clamp: (min, value, max) => Math.min(Math.max(min, value), max),
    rand: (min, max) => Math.floor(Math.random() * (max - min + 1) + min)
  };
  const T = {
    format: (date) => {
      const hours = T.formatHours(date.getHours()),
        minutes = date.getMinutes(),
        seconds = date.getSeconds();
      return `${hours}:${T.formatSegment(minutes)}`;
    },
    formatHours: (hours) => {
      return hours % 12 === 0 ? 12 : hours % 12;
    },
    formatSegment: (segment) => {
      return segment < 10 ? `0${segment}` : segment;
    }
  };
  const LogInUtility = {
    verify: async (pin) => {
      return new Promise((resolve, reject) => {
        setTimeout(() => {
          if (pin === Default.PIN) {
            resolve(true);
          } else {
            reject(`Invalid pin: ${pin}`);
          }
        }, N.rand(300, 700));
      });
    }
  };
  const useCurrentDateEffect = () => {
    const [date, setDate] = React.useState(new Date());
    React.useEffect(() => {
      const interval = setInterval(() => {
        const update = new Date();
        if (update.getSeconds() !== date.getSeconds()) {
          setDate(update);
        }
      }, 100);
      return () => clearInterval(interval);
    }, [date]);
    return date;
  };
  const ScrollableComponent = (props) => {
    const ref = React.useRef(null);
    const [state, setStateTo] = React.useState({
      grabbing: false,
      position: defaultPosition()
    });
    const handleOnMouseDown = (e) => {
      setStateTo(
        Object.assign(Object.assign({}, state), {
          grabbing: true,
          position: {
            x: e.clientX,
            left: ref.current.scrollLeft
          }
        })
      );
    };
    const handleOnMouseMove = (e) => {
      if (state.grabbing) {
        const left = Math.max(
          0,
          state.position.left + (state.position.x - e.clientX)
        );
        ref.current.scrollLeft = left;
      }
    };
    const handleOnMouseUp = () => {
      if (state.grabbing) {
        setStateTo(Object.assign(Object.assign({}, state), { grabbing: false }));
      }
    };
    return React.createElement(
      "div",
      {
        ref: ref,
        className: classNames("scrollable-component", props.className),
        id: props.id,
        onMouseDown: handleOnMouseDown,
        onMouseMove: handleOnMouseMove,
        onMouseUp: handleOnMouseUp,
        onMouseLeave: handleOnMouseUp
      },
      props.children
    );
  };
  const WeatherSnap = () => {
    const [temperature] = React.useState(N.rand(65, 85));
    return React.createElement(
      "span",
      { className: "weather" },
      React.createElement("i", {
        className: "weather-type",
        className: "fa-duotone fa-sun"
      }),
      React.createElement(
        "span",
        { className: "weather-temperature-value" },
        temperature
      ),
      React.createElement(
        "span",
        { className: "weather-temperature-unit" },
        "\u00B0F"
      )
    );
  };
  const Reminder = () => {
    return React.createElement(
      "div",
      { className: "reminder" },
      React.createElement(
        "div",
        { className: "reminder-icon" },
        React.createElement("i", { className: "fa-regular fa-bell" })
      )
    );
  };
  const Time = () => {
    const date = useCurrentDateEffect();
    return React.createElement("span", { className: "time" }, T.format(date));
  };
  const Info = (props) => {
    return React.createElement(
      "div",
      { id: props.id, className: "info" },
      React.createElement(Time, null),
      React.createElement(WeatherSnap, null)
    );
  };
  const PinDigit = (props) => {
    const [hidden, setHiddenTo] = React.useState(false);
    React.useEffect(() => {
      if (props.value) {
        const timeout = setTimeout(() => {
          setHiddenTo(true);
        }, 500);
        return () => {
          setHiddenTo(false);
          clearTimeout(timeout);
        };
      }
    }, [props.value]);
    return React.createElement(
      "div",
      {
        className: classNames("app-pin-digit", {
          focused: props.focused,
          hidden
        })
      },
      React.createElement(
        "span",
        { className: "app-pin-digit-value" },
        props.value || ""
      )
    );
  };
  const Pin = () => {
    const { userStatus, setUserStatusTo } = React.useContext(AppContext);
    const [pin, setPinTo] = React.useState("");
    const ref = React.useRef(null);
    React.useEffect(() => {
      if (
        userStatus === UserStatus.LoggingIn ||
        userStatus === UserStatus.LogInError
      ) {
        ref.current.focus();
      } else {
        setPinTo("");
      }
    }, [userStatus]);
    React.useEffect(() => {
      if (pin.length === 4) {
        const verify = async () => {
          try {
            setUserStatusTo(UserStatus.VerifyingLogIn);
            if (await LogInUtility.verify(pin)) {
              setUserStatusTo(UserStatus.LoggedIn);
            }
          } catch (err) {
            console.error(err);
            setUserStatusTo(UserStatus.LogInError);
          }
        };
        verify();
      }
      if (userStatus === UserStatus.LogInError) {
        setUserStatusTo(UserStatus.LoggingIn);
      }
    }, [pin]);
    const handleOnClick = () => {
      ref.current.focus();
    };
    const handleOnCancel = () => {
      setUserStatusTo(UserStatus.LoggedIn);
    };
    const handleOnChange = (e) => {
      if (e.target.value.length <= 4) {
        setPinTo(e.target.value.toString());
      }
    };
    const getCancelText = () => {
      return React.createElement(
        "span",
        { id: "app-pin-cancel-text", onClick: handleOnCancel },
        "Cancel"
      );
    };
    const getErrorText = () => {
      if (userStatus === UserStatus.LogInError) {
        return React.createElement(
          "span",
          { id: "app-pin-error-text" },
          "Invalid"
        );
      }
    };
    return React.createElement(
      "div",
      { id: "app-pin-wrapper" },
      React.createElement("input", {
        disabled:
          userStatus !== UserStatus.LoggingIn &&
          userStatus !== UserStatus.LogInError,
        id: "app-pin-hidden-input",
        maxLength: 4,
        ref: ref,
        type: "number",
        value: pin,
        onChange: handleOnChange
      }),
      React.createElement(
        "div",
        { id: "app-pin", onClick: handleOnClick },
        React.createElement(PinDigit, {
          focused: pin.length === 0,
          value: pin[0]
        }),
        React.createElement(PinDigit, {
          focused: pin.length === 1,
          value: pin[1]
        }),
        React.createElement(PinDigit, {
          focused: pin.length === 2,
          value: pin[2]
        }),
        React.createElement(PinDigit, {
          focused: pin.length === 3,
          value: pin[3]
        })
      ),
      React.createElement(
        "h3",
        { },
        "Enter PIN (0001) ",
        getErrorText(),
        " ",
        getCancelText()
      )
    );
  };
  const MenuSection = (props) => {
    const getContent = () => {
      if (props.scrollable) {
        return React.createElement(
          ScrollableComponent,
          { className: "menu-section-content" },
          props.children
        );
      }
      return React.createElement(
        "div",
        { className: "menu-section-content" },
        props.children
      );
    };
    return React.createElement(
      "div",
      { id: props.id, className: "menu-section" },
      React.createElement(
        "div",
        { className: "menu-section-title" },
        React.createElement("i", { className: props.icon }),
        React.createElement(
          "span",
          { className: "menu-section-title-text" },
          props.title
        )
      ),
      getContent()
    );
  };
  const QuickNav = () => {
    const getItems = () => {
      return [
        {
          id: 1,
          label: "Weather"
        },
        {
          id: 2,
          label: "Food"
        },
        {
          id: 3,
          label: "Apps"
        },
        {
          id: 4,
          label: "Movies"
        }
      ].map((item) => {
        return React.createElement(
          "div",
          { key: item.id, className: "quick-nav-item clear-button" },
          React.createElement(
            "span",
            { className: "quick-nav-item-label" },
            item.label
          )
        );
      });
    };
    return React.createElement(
      ScrollableComponent,
      { id: "quick-nav" },
     // getItems()
    );
  };
  const Row = () => {
    const getCards = () => {
      return [
        {
          id: 1,
          name: "Result",
          url: "http://localhost/FYP_ERP/Modules/College/Student/student-result1.php"
        },
        {
          id: 2,
          name: "Timetable",
          url: "#"
        },
        {
          id: 3,
          name: "Attendance",
          url: "http://localhost/FYP_ERP/Modules/College/Student/student-index.php"
        },
        {
          id: 4,
          name: "Examination",
          url: "http://localhost/FYP_ERP/Modules/Exam/attemptedExams.php"
        },
        {
          id: 5,
          name: "Placement",
          url: "http://localhost/FYP_ERP/Modules/Placement/Users/dashboard.php"
         
        },
        {
          id: 6,
          name: "Student",
          url: "http://localhost/FYP_ERP/Modules/College/Student/student-index.php",
          tag: "<br>"
        },
      
        
      ].map((day) => 
      {
        return React.createElement(
          "a",
          { key: day.id, className: "day-card", href: day.url, },
          React.createElement(
            "div",
            { className: "day-card-content" },
            
            
            React.createElement("span", { className: "day-name" }, day.name),
            
          )
          
        );
      }
      );
    };
    return React.createElement(
      MenuSection,
      {
        icon: "fa-solid fa-sun",
        id: "weather-section",
        scrollable: true,
        title: "Modules"
      },
      getCards(),
    
    );
  
  };

  const Row1 = () => {
    const getCards1 = () => {
      return [
        {
          id: 7,
          name: "Fees",
          url: "http://localhost/FYP_ERP/Modules/College/Student/student-fee.php"
        },
        {
          id: 8,
          name: "Calendar",
          url: ""
        },
        
      
        
      ].map((day) => 
      {
        return React.createElement(
          "a",
          { key: day.id, className: "day-card", href: day.url, },
          React.createElement(
            "div",
            { className: "day-card-content" },
            
            
            React.createElement("span", { className: "day-name" }, day.name),
            
          )
          
        );
      }
      );
    };
    return React.createElement(
      MenuSection,
      {
        icon: "fa-solid fa-sun",
        id: "weather-section",
        scrollable: true,
      },
      getCards1(),
    
    );
  
  };

  

  const Tools = () => {
    return React.createElement(
      MenuSection,
      {
        icon: "fa-solid fa-toolbox",
        id: "tools-section",
        //title: "What's Appening?"
      },
      //getTools()
    );
  };
  const Restaurants = () => {
    const getRestaurants = () => {
   

      return [
        {
          desc: "",
          id: 1,
          image:
            "../library.jpeg",
          title: "Library",
          url: "http://localhost/FYP_ERP/Modules/Library/Users/book.php"
        },
        {
          desc: "",
          id: 2,
          image:"../w.jpeg",
          title: "Hostel",
          url: "http://localhost/FYP_ERP/Modules/Hostel/student/book-hostel.php"
        },
        {
          desc: "",
          id: 3,
          image:
            "../cafe.jpeg",
          title: "Cafe",
          url: "http://localhost/FYP_ERP/Modules/Cafe/index.php"
        },
        {
          desc: "",
          id: 4,
          image:
            "",
          title: "",
          url: "#"
        }

      ].map((restaurant) => {
        const styles = {
          backgroundImage: `url(${restaurant.image})`
        };
        return React.createElement(
          "a",
          {
            key: restaurant.id,
            className: "restaurant-card background-image",
            href: restaurant.url,
            style: styles
          },
          React.createElement(
            "div",
            { className: "restaurant-card-content" },
            React.createElement(
              "div",
              { className: "restaurant-card-content-items" },
              React.createElement(
                "span",
                { className: "restaurant-card-title" },
                restaurant.title
              ),
              React.createElement(
                "span",
                { className: "restaurant-card-desc" },
                restaurant.desc 
              )
            )
          )
        );
      }
      
      );
    };
    return React.createElement(
      MenuSection,
      {
        icon: "fa-regular fa-pot-food",
        id: "restaurants-section",
        title: "Common Modules"      },
      getRestaurants()
    );
  };
  const Movies = () => {
    const getMovies = () => {
      return [
        {
          desc: "A tale of some people watching over a large portion of space.",
          id: 1,
          icon: "fa-solid fa-galaxy",
          image:
            "https://images.unsplash.com/photo-1596727147705-61a532a659bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bWFydmVsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60",
          title: "Protectors of the Milky Way"
        },
        {
          desc: "Some people leave their holes to disrupt some things.",
          id: 2,
          icon: "fa-solid fa-hat-wizard",
          image:
            "https://images.unsplash.com/photo-1535666669445-e8c15cd2e7d9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bG9yZCUyMG9mJTIwdGhlJTIwcmluZ3N8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60",
          title: "Hole People"
        },
        {
          desc:
            "A boy with a dent in his head tries to stop a bad guy. And by bad I mean bad at winning.",
          id: 3,
          icon: "fa-solid fa-broom-ball",
          image:
            "https://images.unsplash.com/photo-1632266484284-a11d9e3a460a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGhhcnJ5JTIwcG90dGVyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60",
          title: "Pot of Hair"
        },
        {
          desc:
            "A long drawn out story of some people fighting over some space. Cuz there isn't enough of it.",
          id: 4,
          icon: "fa-solid fa-starship-freighter",
          image:
            "https://images.unsplash.com/photo-1533613220915-609f661a6fe1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c3RhciUyMHdhcnN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60",
          title: "Area Fights"
        }
      ].map((movie) => {
        const styles = {
          backgroundImage: `url(${movie.image})`
        };
        const id = `movie-card-${movie.id}`;
        return React.createElement(
          "div",
          { key: movie.id, id: id, className: "movie-card" },
          React.createElement("div", {
            className: "movie-card-background background-image",
            style: styles
          }),
          React.createElement(
            "div",
            { className: "movie-card-content" },
            React.createElement(
              "div",
              { className: "movie-card-info" },
              React.createElement(
                "span",
                { className: "movie-card-title" },
                movie.title
              ),
              React.createElement(
                "span",
                { className: "movie-card-desc" },
                movie.desc
              )
            ),
            React.createElement("i", { className: movie.icon })
          )
        );
      });
    };
    return React.createElement(
      MenuSection,
      {
        icon: "fa-solid fa-camera-movie",
        id: "movies-section",
        scrollable: true,
        //title: "Popcorn time!"
      },
      //getMovies()
    );
  };
  const UserStatusButton = (props) => {
    const { userStatus, setUserStatusTo } = React.useContext(AppContext);
    const handleOnClick = () => {
      setUserStatusTo(props.userStatus);
    };
    return React.createElement(
      "button",
      {
        id: props.id,
        className: "user-status-button clear-button",
        disabled: userStatus === props.userStatus,
        type: "button",
        onClick: handleOnClick
      },
      React.createElement("i", { className: props.icon })
    );
  };
  const Menu = () => {
    return React.createElement(
      "div",
      { id: "app-menu" },
      React.createElement(
        "div",
        { id: "app-menu-content-wrapper" },
        React.createElement(
          "div",
          { id: "app-menu-content" },
          React.createElement(
            "div",
            { id: "app-menu-content-header" },
            React.createElement(
              "div",
              { className: "app-menu-content-header-section" },
              React.createElement(Info, { id: "app-menu-info" }),
              React.createElement(Reminder, null)
            ),
            React.createElement(
              "div",
              { className: "app-menu-content-header-section" },
              React.createElement(UserStatusButton, {
                icon: "fa-solid fa-arrow-right-from-arc",
                id: "sign-out-button",
                userStatus: UserStatus.LoggedIn
              })
            )
          ),
          React.createElement(QuickNav, null),
          React.createElement(Row, null),
          React.createElement(Row1, null),
          React.createElement(Restaurants, null),
          React.createElement(Tools, null),
          React.createElement(Movies, null)
        )
      )
    );
  };
  const Background = () => {
    const { userStatus, setUserStatusTo } = React.useContext(AppContext);
    const handleOnClick = () => {
      // if (userStatus === UserStatus.Logged) {
      //   setUserStatusTo(UserStatus.LoggingIn);
      // }
    };
    return React.createElement(
      "div",
      { id: "app-background", onClick: handleOnClick },
      React.createElement("div", {
        id: "app-background-image",
        className: "background-image"
      })
    );
  };
  const Loading = () => {
    return React.createElement(
      "div",
      { id: "app-loading-icon" },
      React.createElement("i", { className: "fa-solid fa-spinner-third" })
    );
  };
  const AppContext = React.createContext(null);
  const App = () => {
    const [userStatus, setUserStatusTo] = React.useState(UserStatus.LoggedIn);
    const getStatusClass = () => {
      return userStatus.replace(/\s+/g, "-").toLowerCase();
    };
    return React.createElement(
      AppContext.Provider,
      { value: { userStatus, setUserStatusTo } },
      React.createElement(
        "div",
        { id: "app", className: getStatusClass() },
        React.createElement(Info, { id: "app-info" }),
        React.createElement(Pin, null),
        React.createElement(Menu, null),
        React.createElement(Background, null),
        React.createElement(
          "div",
          { id: "sign-in-button-wrapper" },
          React.createElement(UserStatusButton, {
            icon: "fa-solid fa-arrow-right-to-arc",
            id: "sign-in-button",
            userStatus: UserStatus.LoggingIn
          })
        ),
        React.createElement(Loading, null)
      )
    );
  };
  ReactDOM.render(
    React.createElement(App, null),
    document.getElementById("root")
  );
  