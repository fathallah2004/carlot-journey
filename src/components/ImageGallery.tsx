
import { useState } from 'react';

interface ImageGalleryProps {
  images: string[];
  alt: string;
}

const ImageGallery = ({ images, alt }: ImageGalleryProps) => {
  const [activeIndex, setActiveIndex] = useState(0);

  return (
    <div className="space-y-4">
      <div className="relative h-[400px] md:h-[500px] rounded-lg overflow-hidden">
        {images.map((src, index) => (
          <div
            key={index}
            className={`absolute inset-0 transition-opacity duration-500 ${
              activeIndex === index ? 'opacity-100 z-10' : 'opacity-0 z-0'
            }`}
          >
            <img
              src={src}
              alt={`${alt} - Image ${index + 1}`}
              className="w-full h-full object-cover"
            />
          </div>
        ))}
      </div>
      
      <div className="grid grid-cols-5 gap-2">
        {images.map((src, index) => (
          <button
            key={index}
            className={`h-16 md:h-20 rounded-md overflow-hidden transition-all ${
              activeIndex === index 
                ? 'ring-2 ring-primary ring-offset-2 ring-offset-background' 
                : 'opacity-70 hover:opacity-100'
            }`}
            onClick={() => setActiveIndex(index)}
          >
            <img
              src={src}
              alt={`${alt} - Thumbnail ${index + 1}`}
              className="w-full h-full object-cover"
            />
          </button>
        ))}
      </div>
    </div>
  );
};

export default ImageGallery;
