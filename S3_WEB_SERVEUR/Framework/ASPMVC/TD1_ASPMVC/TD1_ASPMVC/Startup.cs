using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(TD1_ASPMVC.Startup))]
namespace TD1_ASPMVC
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
