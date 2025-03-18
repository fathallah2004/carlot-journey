
import Header from '../components/Header';
import Footer from '../components/Footer';

const About = () => {
  return (
    <div className="min-h-screen">
      <Header />
      
      <main className="pt-24 pb-20">
        {/* Hero Section */}
        <section className="relative h-[40vh] min-h-[320px] flex items-center">
          <div className="absolute inset-0 z-0">
            <div className="absolute inset-0 bg-black/50 z-10" />
            <img
              src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2066&q=80"
              alt="Luxury car showroom"
              className="w-full h-full object-cover"
            />
          </div>
          
          <div className="container mx-auto px-4 md:px-8 relative z-10">
            <div className="max-w-2xl">
              <h1 className="text-4xl md:text-5xl font-bold text-white mb-4">About Us</h1>
              <p className="text-xl text-white/90">
                Discover the story behind our passion for automotive excellence.
              </p>
            </div>
          </div>
        </section>
        
        {/* Our Story */}
        <section className="py-16">
          <div className="container mx-auto px-4 md:px-8">
            <div className="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
              <div>
                <div className="inline-block rounded-full px-3 py-1 bg-primary/10 text-primary text-sm font-medium mb-4">
                  Our Story
                </div>
                <h2 className="text-3xl md:text-4xl font-bold mb-6">A Legacy of Excellence</h2>
                <p className="text-gray-700 dark:text-gray-300 mb-4">
                  Founded in 2010, Carlot was born from a passion for automotive excellence and a vision to transform the car buying experience. What began as a small curated collection of premium vehicles has evolved into one of the most respected automotive retailers in the industry.
                </p>
                <p className="text-gray-700 dark:text-gray-300 mb-4">
                  Our commitment to quality, transparency, and customer satisfaction has been the driving force behind our growth. We believe that purchasing a premium vehicle should be an experience as refined as the cars themselves.
                </p>
                <p className="text-gray-700 dark:text-gray-300">
                  Today, we continue to expand our collection while maintaining our founding principles: offering only the finest vehicles, providing exceptional service, and ensuring complete satisfaction for every client who walks through our doors.
                </p>
              </div>
              <div className="relative">
                <div className="relative rounded-lg overflow-hidden">
                  <img
                    src="https://images.unsplash.com/photo-1542282088-72c9c27ed0cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1789&q=80"
                    alt="Our showroom"
                    className="w-full h-full object-cover"
                  />
                </div>
                <div className="absolute -bottom-6 -left-6 w-48 h-48 bg-primary/10 rounded-lg -z-10"></div>
                <div className="absolute -top-6 -right-6 w-48 h-48 bg-primary/10 rounded-lg -z-10"></div>
              </div>
            </div>
          </div>
        </section>
        
        {/* Our Values */}
        <section className="py-16 bg-gray-50 dark:bg-gray-900/50">
          <div className="container mx-auto px-4 md:px-8">
            <div className="text-center mb-12">
              <div className="inline-block rounded-full px-3 py-1 bg-primary/10 text-primary text-sm font-medium mb-4">
                Our Values
              </div>
              <h2 className="text-3xl md:text-4xl font-bold mb-6">What Drives Us</h2>
              <p className="text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
                At Carlot, our values form the foundation of everything we do. They guide our decisions, shape our culture, and define our commitment to both our clients and the automotive industry.
              </p>
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              <ValueCard 
                title="Quality Without Compromise"
                description="We meticulously select each vehicle in our inventory, ensuring only the finest examples make it to our showroom floor."
              />
              <ValueCard 
                title="Transparency & Trust"
                description="We believe in complete honesty about every vehicle's history, condition, and value, building lasting relationships based on trust."
              />
              <ValueCard 
                title="Exceptional Experience"
                description="From the first interaction to years of ownership, we strive to make every aspect of the Carlot experience memorable and satisfying."
              />
            </div>
          </div>
        </section>
        
        {/* Team Section */}
        <section className="py-16">
          <div className="container mx-auto px-4 md:px-8">
            <div className="text-center mb-12">
              <div className="inline-block rounded-full px-3 py-1 bg-primary/10 text-primary text-sm font-medium mb-4">
                Our Team
              </div>
              <h2 className="text-3xl md:text-4xl font-bold mb-6">Meet The Experts</h2>
              <p className="text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
                Our team combines decades of automotive expertise with a passion for exceptional service, creating an unparalleled client experience.
              </p>
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <TeamMember 
                name="Alexander Mitchell"
                position="Founder & CEO"
                image="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1787&q=80"
              />
              <TeamMember 
                name="Sophia Reynolds"
                position="Head of Acquisitions"
                image="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1788&q=80"
              />
              <TeamMember 
                name="James Wilson"
                position="Head of Client Relations"
                image="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1787&q=80"
              />
            </div>
          </div>
        </section>
      </main>
      
      <Footer />
    </div>
  );
};

const ValueCard = ({ title, description }: { title: string; description: string }) => {
  return (
    <div className="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-sm hover:shadow-md transition-shadow">
      <div className="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-6">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16.5 4L21.5 9L16.5 14" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
          <path d="M21.5 9H7.5C4.18629 9 1.5 11.6863 1.5 15V20" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
        </svg>
      </div>
      <h3 className="text-xl font-semibold mb-3">{title}</h3>
      <p className="text-gray-600 dark:text-gray-400">{description}</p>
    </div>
  );
};

const TeamMember = ({ name, position, image }: { name: string; position: string; image: string }) => {
  return (
    <div className="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
      <div className="h-64 overflow-hidden">
        <img 
          src={image} 
          alt={name} 
          className="w-full h-full object-cover transition-transform hover:scale-105 duration-500"
        />
      </div>
      <div className="p-6">
        <h3 className="text-xl font-semibold mb-1">{name}</h3>
        <p className="text-gray-600 dark:text-gray-400">{position}</p>
      </div>
    </div>
  );
};

export default About;
